<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 *
 * @property-read mixed $track
 * @property-read mixed $visitor
 * @property-read mixed $visitorGenre
 */
class Genre extends ActiveRecord
{
    public static function tableName()
    {
        return 'genre';
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrack()
    {
        return $this->hasMany(Track::class, ['genre_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVisitorGenre()
    {
        return $this->hasMany(VisitorGenre::class, ['genre_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     * @throws \yii\base\InvalidConfigException
     */
    public function getVisitor()
    {
        return $this->hasMany(Visitor::class, ['id' => 'visitor_id'])
            ->viaTable('visitor_genre', ['genre_id' => 'id']);
    }

    /**
     * @return array
     */
    public static function getDropDown()
    {
        return ArrayHelper::map(self::find()->all(), 'id', 'name');
    }

    public function findGenres()
    {
        return self::find()->all();
    }
}