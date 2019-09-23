<?php

use yii\db\Migration;

class m190916_184025_create_track_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%track}}', [
            'id' => $this->primaryKey(11)->unsigned(),
            'name' => $this->string(255)->null(),
            'duration' => $this->integer()->null(),
            'genre_id' => $this->integer(11)->unsigned()->null(),
        ]);

        $this->addForeignKey(
            'FK_track_genre_id',
            'track',
            'genre_id',
            'genre',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey(
            'FK_track_genre_id',
            'track'
        );

        $this->dropTable('{{%track}}');
    }
}
