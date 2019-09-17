<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 16.09.2019
 * Time: 22:37
 */

namespace app\models;

use yii\db\ActiveRecord;

class Playlist extends ActiveRecord
{
    public static function tableName()
    {
        return 'playlist';
    }

    public function getPlaylistTrack()
    {
        return $this->hasMany(PlaylistTrack::class, ['playlist_id' => 'id']);
    }

    public function getClub()
    {
        return $this->hasMany(Club::class, ['playlist_id' => 'id']);
    }

    public function rules()
    {
        return [
            [['id, name'], 'safe'],
        ];
    }
}