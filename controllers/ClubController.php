<?php
/**
 * Created by PhpStorm.
 * User: sergei-sm
 * Date: 17.09.2019
 * Time: 11:54
 */

namespace app\controllers;

use app\models\Club;
use app\models\Genre;
use app\models\Playlist;
use app\models\PlaylistTrack;
use app\models\Track;
use app\models\Visitor;
use app\models\Company;
use app\models\VisitorGenre;
use Yii;
use yii\web\NotFoundHttpException;

class ClubController extends AppController
{
    public function actionIndex()
    {
        $club = new Club();
        $clubs = $club->findClubs();

        return $this->render('index', compact('clubs'));
    }

    public function actionView($id)
    {
        $club = $this->findModel($id);

        $tracks = $club->findTracks($id);

        return $this->render('view', compact('club', 'tracks'));
    }

    public function actionAdd()
    {
        // TODO: Нужен тест, если плейлист не существует, значение по умолчанию defaultValue('Плейлист пуст'),
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

    // TODO не реализован функционал танцоров по условию
    // танцпол
    public function actionDanceFloor($id)
    {
        $club = $this->findModel($id);

        $dancers = $club->findDancers($id);
        $tracks = $club->findDancersTracks($id);

        return $this->render('dance-floor', compact('club', 'dancers', 'tracks'));
    }

    // убрать посетителя из клуба
    public function actionExitVisitor($visitor_id, $club_id)
    {
        $clubVisitor = $this->findModel($club_id);
        $clubVisitor->exitVisitor($visitor_id);

        return $this->redirect(Yii::$app->request->referrer);
    }

    // убрать группу из клуба
    public function actionExitCompany($company_id, $club_id)
    {
        $clubCompany = $this->findModel($club_id);
        $clubCompany->exitCompany($company_id);

        return $this->redirect(Yii::$app->request->referrer);
    }

    // поиск записи в таблице
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