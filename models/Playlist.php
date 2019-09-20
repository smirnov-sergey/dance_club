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
}