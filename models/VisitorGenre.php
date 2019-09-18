<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 16.09.2019
 * Time: 22:38
 */

namespace app\models;

use yii\db\ActiveRecord;

class VisitorGenre extends ActiveRecord
{
    public static function tableName()
    {
        return 'visitor_genre';
    }

    public function getGenre()
    {
        return $this->hasMany(Genre::class, ['id' => 'genre_id']);
    }

    public function getVisitor()
    {
        return $this->hasMany(Visitor::class, ['id' => 'visitor_id']);
    }

    public function rules()
    {
        return [
            [['visitor_id', 'genre_id'], 'safe'],
        ];
    }
}