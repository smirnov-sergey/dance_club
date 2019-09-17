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

    public function getVisitorGenre()
    {
        return $this->hasMany(VisitorGenre::class, ['visitor_id' => 'id']);
    }

    public function rules()
    {
        return [
            [['id, name, gender, club_id, company_id'], 'safe'],
        ];
    }
}