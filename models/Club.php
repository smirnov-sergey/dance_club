<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 16.09.2019
 * Time: 22:39
 */

namespace app\models;

use yii\db\ActiveRecord;

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

    public function rules()
    {
        return [
            [['id, playlist_id'], 'safe'],
            ['status', 'default', 'value' => self::STATUS_INACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE]],
        ];
    }


}