<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 16.09.2019
 * Time: 22:23
 */

namespace app\models;

use yii\db\ActiveRecord;

class Genre extends ActiveRecord
{
    public static function tableName()
    {
        return 'genre';
    }

    public function getTrack()
    {
        return $this->hasMany(Track::class, ['genre_id' => 'id']);
    }

    public function getVisitorGenre()
    {
        return $this->hasMany(VisitorGenre::class, ['genre_id' => 'id']);
    }

    public function rules()
    {
        return [
            [['id, name'], 'safe'],
        ];
    }

}