<?php
/**
 * Created by PhpStorm.
 * User: sergei-sm
 * Date: 20.09.2019
 * Time: 12:19
 */

namespace app\controllers;

use app\models\Club;
use app\models\Genre;
use app\models\Playlist;
use app\models\PlaylistTrack;
use app\models\Track;

class DanceFloorController extends AppController
{
    public function actionIndex()
    {
        $clubs = Club::find()->with('visitor', 'playlist', 'company')->all();

        $playlists = Playlist::find()
            ->select('playlist.name')
            ->innerJoin(PlaylistTrack::tableName(), 'playlist.id = playlist_track.playlist_id')
            ->innerJoin(Track::tableName(), 'playlist_track.track_id = track.id')
            ->all();

        $tracks = Club::find()
            ->select(['track.name', 'club.name'])
            ->innerJoin(Playlist::tableName(), 'club.playlist_id = playlist.id')
            ->innerJoin(PlaylistTrack::tableName(), 'playlist.id = playlist_track.playlist_id')
            ->innerJoin(Track::tableName(), 'playlist_track.track_id = track.id')
            ->all();

        $genres = Club::find()
            ->select('genre.name')
            ->innerJoin(Playlist::tableName(), 'club.playlist_id = playlist.id')
            ->innerJoin(PlaylistTrack::tableName(), 'playlist.id = playlist_track.playlist_id')
            ->innerJoin(Track::tableName(), 'playlist_track.track_id = track.id')
            ->innerJoin(Genre::tableName(), 'track.genre_id = genre.id')
            ->all();

        // echo '<pre>' . print_r($tracks, true) . '</pre>';

        $arr = [];

        foreach ($tracks as $track) {
            $clubId = $track->name;
            $trackName = $track->playlist->playlistTrack->track->name;

            $arr[$clubId];

            if (isset($arr[$clubId])) {
                $arr[$clubId] = [];
            }

            $arr[$clubId][] = $trackName;
        }

        // echo '<pre>' . print_r($arr, true) . '</pre>';

        return $this->render('index', compact('clubs', 'playlists', 'tracks', 'genres'));
    }
}