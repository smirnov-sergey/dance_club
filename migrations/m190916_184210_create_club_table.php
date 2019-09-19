<?php

use yii\db\Migration;

class m190916_184210_create_club_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%club}}', [
            'id' => $this->primaryKey(11)->unsigned(),
            'name' => $this->string(255)->null(),
            'playlist_id' => $this->integer(11)->unsigned()->null(),
        ]);

        $this->addForeignKey(
            'FK_club_playlist_id',
            'club',
            'playlist_id',
            'playlist',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey(
            'FK_club_playlist_id',
            'club'
        );

        $this->dropTable('{{%club}}');
    }
}
