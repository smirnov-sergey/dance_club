<?php
namespace app\controllers;

use app\models\Track;
use Yii;
use yii\web\NotFoundHttpException;

class TrackController extends AppController
{
    public function actionIndex()
    {
        $tracks = Track::find()->with(['genre'])->all();

        return $this->render('index', compact('tracks'));
    }

    public function actionView($id)
    {
        $track = $this->findModel($id);

        return $this->render('view', compact('track'));
    }

    public function actionAdd()
    {
        $track = new Track();

        if ($track->load(Yii::$app->request->post()) && $track->validate()) {
            if ($track->save()) {
                return $this->redirect(['track/index']);
            }
        }

        return $this->render('add', compact('track'));
    }

    public function actionUpdate($id)
    {
        $track = $this->findModel($id);

        if ($track->load(Yii::$app->request->post()) && $track->validate()) {
            if ($track->save()) {
                return $this->redirect(['track/index']);
            }
        }

        return $this->render('update', compact('track'));
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['track/index']);
    }

    //поиск записи в таблице
    protected function findModel($id)
    {
        if (($track = Track::findOne($id)) !== null) {
            return $track;
        } else {
            throw new NotFoundHttpException('Данного трека не существует');
        }
    }

    // поиск по имени трека
    public function actionSearch($search)
    {
        if (!$search)
            return $this->render('search');

        $tracks = Track::find()->where(['like', 'name', $search])->all();

        return $this->render('search', compact('tracks', 'search'));
    }
}