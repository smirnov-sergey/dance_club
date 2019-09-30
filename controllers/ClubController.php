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
        $clubs = Club::find()->with('visitor', 'playlist', 'company')->all();

        return $this->render('index', compact('clubs'));
    }

    public function actionView($id)
    {
        $club = $this->findModel($id);

        $tracks = Club::find()
            ->select(['trackName' => 'track.name', 'genreName' => 'genre.name'])
            ->innerJoin(Playlist::tableName(), 'playlist.id = club.playlist_id')
            ->innerJoin(PlaylistTrack::tableName(), 'playlist.id = playlist_track.playlist_id')
            ->innerJoin(Track::tableName(), 'playlist_track.track_id = track.id')
            ->innerJoin(Genre::tableName(), 'track.genre_id = genre.id')
            ->where(['club.id' => $id])
            ->asArray()
            ->all();

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

        // найти в клубе: плейлист, жанр музыки, посетителя, который знает данный жанр
        $dancers = Track::find()
            ->select(['trackName' => 'track.name', 'genreName' => 'genre.name', 'visitorName' => 'visitor.name',
                'visitorId' => 'visitor.id', 'genreId' => 'genre.id', 'visitorGenreId' => 'visitor_genre.genre_id',
                'visitorClub' => 'visitor.club_id', 'visitorGender' => 'visitor.gender', 'trackId' => 'track.id'])
            ->innerJoin(PlaylistTrack::tableName(), 'playlist_track.track_id = track.id')
            ->innerJoin(Playlist::tableName(), 'playlist.id = playlist_track.playlist_id')
            ->innerJoin(Club::tableName(), 'club.playlist_id = playlist.id')
            ->innerJoin(VisitorGenre::tableName(), 'visitor_genre.genre_id = track.genre_id')
            ->innerJoin(Genre::tableName(), 'genre.id = track.genre_id')
            ->rightJoin(Visitor::tableName(), [
                'and',
                'visitor.id = visitor_genre.visitor_id',
                'visitor.club_id = club.id'
            ])
            ->where(['club.id' => $id])
            ->asArray()
            ->all();

        // TODO сделать группировку посетителям по треку, сейчас все посетитетели по одиночке
        // группировка по трекам
        foreach ($dancers as $track) {
            $tracks[] = [
                $track['trackId'] =>
                    $track['visitorName']
            ];
        }

        // 2 вариант
        foreach ($dancers as $dance) {
            // танцуют те, кто знает жанр музыки
            if ($dance['genreId'] == $dance['visitorGenreId']) {
                $soloDance[] = $dance['visitorName'];
            }

            // разделить посетителей по полу
            if ($dance['visitorGender'] == 'мужской') {
                $manNames[] = $dance['visitorName'];
            } elseif ($dance['visitorGender'] == 'женский') {
                $womanNames[] = $dance['visitorName'];
            };

            // если жанр музыки 'romance' - создаются пары
            if ($dance['genreName'] == 'romance') {
                for ($i = 0; $i <= min(count($manNames), count($womanNames)); $i++) {
                    $couples[] = $manNames[$i] . ' + ' . $womanNames[$i];
                }
            }
        }

        // echo '<pre>' . print_r($tracks, true) . '</pre>';

        return $this->render('dance-floor', compact('club', 'dancers', 'couples', 'soloDance'));
    }

    // убрать посетителя из клуба
    public function actionExitVisitor($visitor_id, $club_id)
    {
        $this->findModel($club_id);

        // TODO: переделать запросы, для защиты от SQL инъекций
        // Выходит Visitor
        Yii::$app->db->createCommand(
            "UPDATE visitor JOIN club ON club.id = visitor.club_id SET visitor.company_id = NULL, visitor.club_id = NULL WHERE visitor.id = $visitor_id;")
            ->execute();

        return $this->redirect(Yii::$app->request->referrer);
    }

    // убрать группу из клуба
    public function actionExitCompany($company_id, $club_id)
    {
        $this->findModel($club_id);

        // TODO: переделать запросы, для защиты от SQL инъекций
        // Выходит Company
        Yii::$app->db->createCommand(
            "UPDATE visitor JOIN club ON club.id = visitor.club_id INNER JOIN company ON visitor.company_id = company.id SET visitor.company_id = NULL, visitor.club_id = NULL WHERE company.id = $company_id;")
            ->execute();

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