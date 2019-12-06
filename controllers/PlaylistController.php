<?php
/**
 * Created by PhpStorm.
 * User: sergei-sm
 * Date: 17.09.2019
 * Time: 16:22
 */

namespace app\controllers;

use app\models\Genre;
use app\models\Playlist;
use app\models\PlaylistTrack;
use app\models\Track;
use Yii;
use yii\web\NotFoundHttpException;

class PlaylistController extends AppController
{
    public function actionIndex()
    {
        $playlist = new Playlist();
        $playlists = $playlist->findPlaylists();

        return $this->render('index', compact('playlists'));
    }

    public function actionView($id)
    {
        $playlist = $this->findModel($id);

        $genres = $playlist->findGenres($id);

        return $this->render('view', compact('playlist', 'genres'));
    }

    public function actionAdd()
    {
        $playlist = new Playlist();

        //TODO: сделать выбор нескольких треков музыки.
        if ($playlist->load(Yii::$app->request->post()) && $playlist->validate()) {
            if ($playlist->save()) {
                //TODO Рефакторинг
                $playlistTrack = new PlaylistTrack();
                $playlistTrack->playlist_id = $playlist->id;
                $playlistTrack->track_id = Yii::$app->request->post()['Playlist']['track'];
                $playlistTrack->save();

                return $this->redirect(['playlist/index']);
            }
        }

        return $this->render('add', compact('playlist'));
    }

    public function actionUpdate($id)
    {
        $playlist = $this->findModel($id);

        //TODO: При изменение старые треки музыки удаляются, новые сохраняются
        if ($playlist->load(Yii::$app->request->post()) && $playlist->validate()) {
            if ($playlist->save()) {
                $playlistTrack = new PlaylistTrack();
                $playlistTrack->playlist_id = $playlist->id;
                $playlistTrack->track_id = Yii::$app->request->post()['Playlist']['track'];
                $playlistTrack->save();

                return $this->redirect(['playlist/index']);
            }
        }

        return $this->render('update', compact('playlist'));
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['playlist/index']);
    }

    //поиск записи в таблице
    protected function findModel($id)
    {
        if (($playlist = Playlist::findOne($id)) !== null) {
            return $playlist;
        } else {
            throw new NotFoundHttpException('Данного плейлиста не существует');
        }
    }

    // поиск по названию плейлиста
    public function actionSearch($search)
    {
        if (!$search)
            return $this->render('search');

        $playlists = Playlist::find()->where(['like', 'name', $search])->all();

        return $this->render('search', compact('playlists', 'search'));
    }
}