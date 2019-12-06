<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 16.09.2019
 * Time: 22:40
 */

namespace app\models;


use yii\db\ActiveRecord;

class Visitor extends ActiveRecord
{
    public static function tableName()
    {
        return 'visitor';
    }

    public function getCompany()
    {
        return $this->hasOne(Company::class, ['id' => 'company_id']);
    }

    public function getClub()
    {
        return $this->hasOne(Club::class, ['id' => 'club_id']);
    }

    //Для связи c Genre, через таблицу VisitorGenre
    public function getGenre()
    {
        return $this->hasMany(Genre::class, ['id' => 'genre_id'])
            ->viaTable('visitor_genre', ['visitor_id' => 'id']);
    }

    public function getVisitorGenre()
    {
        return $this->hasMany(VisitorGenre::class, ['visitor_id' => 'id']);
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['id', 'name', 'gender', 'club_id', 'company_id'], 'safe'],
            [['name'], 'string', 'min' => 3, 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Имя посетителя',
            'gender' => 'Пол',
            'club_id' => 'Клуб',
            'company_id' => 'Группа',
            'genre' => 'Жанр музыки',
        ];
    }

    // поиск всех посетителей
    public function findVisitors()
    {
        return Visitor::find()->with(['company', 'club', 'genre'])->all();
    }
}