<?php

use yii\db\Migration;

class m190917_082125_insert_visitor_genre_table extends Migration
{
    public function safeUp()
    {
        $this->insert('visitor_genre', [
            'visitor_id' => '1',
            'genre_id' => '3',
        ]);

        $this->insert('visitor_genre', [
            'visitor_id' => '2',
            'genre_id' => '2',
        ]);

        $this->insert('visitor_genre', [
            'visitor_id' => '3',
            'genre_id' => '2',
        ]);

        $this->insert('visitor_genre', [
            'visitor_id' => '4',
            'genre_id' => '2',
        ]);

        $this->insert('visitor_genre', [
            'visitor_id' => '1',
            'genre_id' => '2',
        ]);


        $this->insert('visitor_genre', [
            'visitor_id' => '5',
            'genre_id' => '2',
        ]);

        $this->insert('visitor_genre', [
            'visitor_id' => '6',
            'genre_id' => '2',
        ]);


        $this->insert('visitor_genre', [
            'visitor_id' => '7',
            'genre_id' => '4',
        ]);


        $this->insert('visitor_genre', [
            'visitor_id' => '8',
            'genre_id' => '3',
        ]);

        $this->insert('visitor_genre', [
            'visitor_id' => '9',
            'genre_id' => '3',
        ]);

        $this->insert('visitor_genre', [
            'visitor_id' => '10',
            'genre_id' => '2',
        ]);
    }

    public function safeDown()
    {
        $this->delete('{{%visitor_genre}}', ['id' => 0]);
    }
}
