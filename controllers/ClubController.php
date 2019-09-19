<?php
/**
 * Created by PhpStorm.
 * User: sergei-sm
 * Date: 17.09.2019
 * Time: 11:54
 */

namespace app\controllers;

use app\models\Club;
use app\models\Visitor;
use app\models\Company;
use Yii;
use yii\web\NotFoundHttpException;

class ClubController extends AppController
{
    public function actionIndex()
    {
        $clubs = Club::find()->with('visitor', 'playlist', 'company')->all();

        return $this->render('index', compact('clubs'));
    }

    public function actionView($id)
    {
        $club = $this->findModel($id);

        $visitors = Club::find()
            ->select('visitor.name')
            ->innerJoin(Visitor::tableName(), 'club.id = visitor.club_id')
            ->innerJoin(Company::tableName(), 'visitor.company_id = company.id')
            ->where(['club.id' => $id])
            ->all();

        $companies = Club::find()
            ->select('company.name')
            ->innerJoin(Visitor::tableName(), 'club.id = visitor.club_id')
            ->innerJoin(Company::tableName(), 'visitor.company_id = company.id')
            ->where(['club.id' => $id])
            ->all();

        return $this->render('view', compact('club', 'visitors', 'companies'));
    }

    public function actionAdd()
    {
        //TODO Нужен тест, если плейлист не существует, значение по умолчанию defaultValue('Плейлист пуст'),
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

    public function actionExitVisitor($id)
    {
        $this->findModel($id);

        Yii::$app->db->createCommand()->update('visitor', ['club_id' => 1], ['club_id' => $id])->execute();

        return $this->redirect(['club/index']);
    }

    public function actionExitCompany($id)
    {
        $this->findModel($id);

        Yii::$app->db->createCommand()->update('visitor', ['club_id' => null, 'company_id' => null], ['company.id' => $id])->execute();

        Yii::$app->db->createCommand(
            "UPDATE visitor JOIN club ON club.id = visitor.club_id INNER JOIN company ON visitor.company_id = company.id SET visitor.company_id = NULL, visitor.club_id = NULL WHERE company.id = $id;")
            ->execute();

        /*  UPDATE visitor
                JOIN club
                    ON club.id = visitor.club_id
                INNER JOIN company
                    ON visitor.company_id = company.id
                SET visitor.company_id = NULL,
                    visitor.club_id      = NULL
                        WHERE company.id = 2;*/

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

        $clubs = Club::find()->where(['like', 'name', $search])->all();

        return $this->render('search', compact('clubs', 'search'));
    }
}