<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 16.09.2019
 * Time: 22:36
 */

namespace app\models;

use yii\db\ActiveRecord;

class Track extends ActiveRecord
{
    public static function tableName()
    {
        return 'track';
    }

    public function getGenre()
    {
        return $this->hasOne(Genre::class, ['id' => 'genre_id']);
    }

    public function getPlaylistTrack()
    {
        return $this->hasMany(PlaylistTrack::class, ['track_id' => 'id']);
    }

    public function rules()
    {
        return [
            [['id', 'name', 'genre_id'], 'safe'],
            [['name'], 'string', 'min' => 3, 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Название трека',
            'genre_id' => 'Жанр музыки',
        ];
    }

}