<?php

use yii\db\Migration;

class m190916_184244_create_visitor_genre_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%visitor_genre}}', [
            'id' => $this->primaryKey(11)->unsigned(),
            'visitor_id' => $this->integer(11)->unsigned(),
            'genre_id' => $this->integer(11)->unsigned(),
        ]);

        $this->addForeignKey(
            'FK_visitor_genre_visitor_id',
            'visitor_genre',
            'visitor_id',
            'visitor',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'FK_visitor_genre_genre_id',
            'visitor_genre',
            'genre_id',
            'genre',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey(
            'FK_visitor_genre_visitor_id',
            'visitor_genre'
        );

        $this->dropForeignKey(
            'FK_visitor_genre_genre_id',
            'visitor_genre'
        );

        $this->dropTable('{{%visitor_genre}}');
    }
}
