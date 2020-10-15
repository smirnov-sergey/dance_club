<?php

namespace app\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use app\models\Club;

class ClubController extends AppController
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        $club = new Club();
        $clubs = $club->findClubs();

        return $this->render('index', [
            'clubs' => $clubs
        ]);
    }

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        $club = $this->findModel($id);
        $tracks = $club->findTracks($id);

        return $this->render('view', [
            'club' => $club,
            'tracks' => $tracks
        ]);
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionAdd()
    {
        // @TODO: Нужен тест, если плейлист не существует, значение по умолчанию defaultValue('Плейлист пуст')
        $club = new Club();

        if ($club->load(Yii::$app->request->post()) && $club->validate()) {
            if ($club->save()) {
                return $this->redirect(['club/index']);
            }
        }

        return $this->render('add', [
            'club' => $club
        ]);
    }

    /**
     * @param $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        $club = $this->findModel($id);

        if ($club->load(Yii::$app->request->post()) && $club->validate()) {
            if ($club->save()) {
                return $this->redirect(['club/index']);
            }
        }

        return $this->render('update', [
            'club' => $club
        ]);
    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $club = $this->findModel($id);
        $club->delete();

        return $this->redirect(['club/index']);
    }

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    // @TODO не реализован функционал танцоров по условию
    public function actionDanceFloor($id)
    {
        $club = $this->findModel($id);

        $dancers = $club->findDancers($id);
        $tracks = $club->findDancersTracks($id);

        return $this->render('dance-floor', [
            'club' => $club,
            'dancers' => $dancers,
            'tracks' => $tracks
        ]);
    }

    /**
     * убрать посетителя из клуба
     *
     * @param $visitor_id
     * @param $club_id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     * @throws \yii\db\Exception
     */
    public function actionExitVisitor($visitor_id, $club_id)
    {
        $club_visitor = $this->findModel($club_id);
        $club_visitor->exitVisitor($visitor_id);

        return $this->redirect(Yii::$app->request->referrer);
    }


    /**
     * убрать группу из клуба
     *
     * @param $company_id
     * @param $club_id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     * @throws \yii\db\Exception
     */
    public function actionExitCompany($company_id, $club_id)
    {
        $club_company = $this->findModel($club_id);
        $club_company->exitCompany($company_id);

        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * @param $id
     * @return Club
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        $club = Club::findOne($id);
        if ($club !== null) {
            return $club;
        }

        throw new NotFoundHttpException('Данного клуба не существует');
    }

    /**
     * @param $search
     * @return string
     */
    public function actionSearch($search)
    {
        $clubs = Club::find()
            ->where(['like', 'name', $search])
            ->all();

        return $this->render('search', [
            'clubs' => $clubs,
            'search' => $search
        ]);
    }
}