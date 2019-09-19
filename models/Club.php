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

class Club extends ActiveRecord
{
    // Музыка играет (плейлист вкл\откл)
    const STATUS_ACTIVE = 10;
    const STATUS_INACTIVE = 0;

    public static function tableName()
    {
        return 'club';
    }

    public function getPlaylist()
    {
        return $this->hasOne(Playlist::class, ['id' => 'playlist_id']);
    }

    public function getVisitor()
    {
        return $this->hasMany(Visitor::class, ['club_id' => 'id']);
    }

    //Для связи c Company, через таблицу Visitor
    public function getCompany()
    {
        return $this->hasMany(Company::class, ['id' => 'company_id'])
            ->viaTable(Visitor::tableName(), ['club_id' => 'id']);
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['playlist_id'], 'safe'],
            [['name'], 'string', 'min' => 3, 'max' => 255],
//            ['status', 'default', 'value' => self::STATUS_INACTIVE],
//            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE]],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Название клуба',
            'playlist_id' => 'Выбрать плейлист',
        ];
    }

    //для выпадающего списка в форме заполнения Visitor
    public static function getDropDown()
    {
        return ArrayHelper::map(self::find()->all(), 'id', 'name');
    }
}