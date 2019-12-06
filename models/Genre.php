<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 16.09.2019
 * Time: 22:23
 */

namespace app\models;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

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

    //Для связи c Visitor, через таблицу VisitorGenre
    public function getVisitor()
    {
        return $this->hasMany(Visitor::class, ['id' => 'visitor_id'])
            ->viaTable('visitor_genre', ['genre_id' => 'id']);
    }

    public function rules()
    {
        return [
            [['id', 'name'], 'safe'],
            [['name'], 'string', 'min' => 3, 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'id жанра музыки',
            'name' => 'Название жанра музыки',
        ];
    }

    //для выпадающего списка в форме заполнения Track, Visitor
    public static function getDropDown()
    {
        return ArrayHelper::map(self::find()->all(), 'id', 'name');
    }

    // поиск всех жанров
    public function findGenres()
    {
        return Genre::find()->all();
    }
}