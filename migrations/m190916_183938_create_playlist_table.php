<?php

use yii\db\Migration;

class m190916_183938_create_playlist_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%playlist}}', [
            'id' => $this->primaryKey(11)->unsigned(),
            'name' => $this->string(255)->defaultValue('Плейлист пуст'),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%playlist}}');
    }
}
