<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 16.09.2019
 * Time: 22:37
 */

namespace app\models;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class Playlist extends ActiveRecord
{
    public static function tableName()
    {
        return 'playlist';
    }

    public function getClub()
    {
        return $this->hasMany(Club::class, ['playlist_id' => 'id']);
    }

    public function getPlaylistTrack()
    {
        return $this->hasMany(PlaylistTrack::class, ['playlist_id' => 'id']);
    }

    //Для связи c Track, через таблицу PlaylistTrack
    public function getTrack()
    {
        return $this->hasMany(Track::class, ['id' => 'track_id'])
            ->viaTable('playlist_track', ['playlist_id' => 'id']);
    }

    public function rules()
    {
        return [
            [['id'], 'safe'],
            [['name'], 'string', 'min' => 3, 'max' => 255],

        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Название плейлиста',
            'track' => 'Треки',
        ];
    }

    //для выпадающего списка в форме заполнения Club
    public static function getDropDown()
    {
        return ArrayHelper::map(self::find()->all(), 'id', 'name');
    }

    // поиск всех плейлистов
    public function findPlaylists()
    {
        return Playlist::find()->with(['track'])->all();
    }

    // поиск всех жанров музыки у плейлиста
    public function findGenres($id)
    {
        return Playlist::find()
            ->select('genre.name')
            ->innerJoin(PlaylistTrack::tableName(), 'playlist.id = playlist_track.playlist_id')
            ->innerJoin(Track::tableName(), 'playlist_track.track_id = track.id')
            ->innerJoin(Genre::tableName(), 'track.genre_id = genre.id')
            ->where(['playlist.id' => $id])
            ->all();
    }
}