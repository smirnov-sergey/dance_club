<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 16.09.2019
 * Time: 22:39
 */

namespace app\models;


use yii\db\ActiveRecord;

class PlaylistTrack extends ActiveRecord
{
    public static function tableName()
    {
        return 'playlist_track';
    }

    public function getTrack()
    {
        return $this->hasMany(Track::class, ['id' => 'track_id']);
    }

    public function getPlaylist()
    {
        return $this->hasMany(Playlist::class, ['id' => 'playlist_id']);
    }

    public function rules()
    {
        return [
            [['playlist_id', 'track_id'], 'safe'],
        ];
    }

}