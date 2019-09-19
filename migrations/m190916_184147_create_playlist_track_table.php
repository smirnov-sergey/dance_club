<?php

use yii\db\Migration;

class m190916_184147_create_playlist_track_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%playlist_track}}', [
            'id' => $this->primaryKey(11)->unsigned(),
            'playlist_id' => $this->integer(11)->unsigned()->null(),
            'track_id' => $this->integer(11)->unsigned()->null(),
        ]);

        $this->addForeignKey(
            'FK_playlist_track_playlist_id',
            'playlist_track',
            'playlist_id',
            'playlist',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'FK_playlist_track_track_id',
            'playlist_track',
            'track_id',
            'track',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey(
            'FK_playlist_track_playlist_id',
            'playlist_track'
        );

        $this->dropForeignKey(
            'FK_playlist_track_track_id',
            'playlist_track'
        );

        $this->dropTable('{{%playlist_track}}');
    }
}
