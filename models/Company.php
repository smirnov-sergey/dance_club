<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 16.09.2019
 * Time: 22:39
 */

namespace app\models;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class Company extends ActiveRecord
{
    public static function tableName()
    {
        return 'company';
    }

    public function getVisitor()
    {
        return $this->hasMany(Visitor::class, ['company_id' => 'id']);
    }

    //Для связи c Club, через таблицу Visitor
    public function getClub()
    {
        return $this->hasOne(Club::class, ['id' => 'club_id'])
            ->viaTable(Visitor::tableName(), ['company_id' => 'id']);
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['id', 'name'], 'safe'],
            [['name'], 'string', 'min' => 3, 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Название группы',
        ];
    }

    //для выпадающего списка в форме заполнения Visitor
    public static function getDropDown()
    {
        return ArrayHelper::map(self::find()->all(), 'id', 'name');
    }
}