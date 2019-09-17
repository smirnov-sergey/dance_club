<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 16.09.2019
 * Time: 22:39
 */

namespace app\models;


use yii\db\ActiveRecord;

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

    public function rules()
    {
        return [
            [['id, name'], 'safe'],
        ];
    }
}