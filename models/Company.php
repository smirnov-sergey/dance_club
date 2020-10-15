<?php
namespace app\models;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 *
 * @property-read mixed $club
 * @property-read mixed $visitor
 */
class Company extends ActiveRecord
{
    public static function tableName()
    {
        return 'company';
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

    /**
     * Для связи c Club, через таблицу Visitor
     * @return \yii\db\ActiveQuery
     * @throws \yii\base\InvalidConfigException
     */
    public function getClub()
    {
        return $this->hasOne(Club::class, ['id' => 'club_id'])
            ->viaTable(Visitor::tableName(), ['company_id' => 'id']);
    }

    /**
     * для выпадающего списка в форме заполнения Visitor
     * @return array
     */
    public static function getDropDown()
    {
        return ArrayHelper::map(self::find()->all(), 'id', 'name');
    }

    public function findCompanies()
    {
        return self::find()->all();
    }
}