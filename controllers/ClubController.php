<?php
/**
 * Created by PhpStorm.
 * User: sergei-sm
 * Date: 17.09.2019
 * Time: 11:54
 */

namespace app\controllers;

use app\models\Club;
use Yii;
use yii\web\NotFoundHttpException;

class ClubController  extends AppController
{
    public function actionIndex()
    {
        $clubs = Club::find()->all();

        return $this->render('index', compact('clubs'));
    }

    public function actionView($id)
    {
        $club = $this->findModel($id);

        return $this->render('view', compact('club'));
    }

    public function actionAdd()
    {
        $club = new Club();

        if ($club->load(Yii::$app->request->post()) && $club->validate()) {
            if ($club->save()) {
                return $this->redirect(['club/index']);
            }
        }

        return $this->render('add', compact('club'));
    }

    public function actionUpdate($id)
    {
        $club = $this->findModel($id);

        if ($club->load(Yii::$app->request->post()) && $club->validate()) {
            if ($club->save()) {
                return $this->redirect(['club/index']);
            }
        }

        return $this->render('update', compact('club'));
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['club/index']);
    }

    //поиск записи в таблице
    protected function findModel($id)
    {
        if (($club = Club::findOne($id)) !== null) {
            return $club;
        } else {
            throw new NotFoundHttpException('Данного клуба не существует');
        }
    }

    // поиск по названию клуба
    public function actionSearch($search)
    {
        if (!$search)
            return $this->render('search');

        $club = Club::find()->where(['like', 'name', $search])->with(['track'])->all();

        return $this->render('search', compact('club', 'search'));
    }


}