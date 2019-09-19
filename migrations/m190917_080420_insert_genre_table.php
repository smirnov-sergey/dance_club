<?php

use yii\db\Migration;

class m190917_080420_insert_genre_table extends Migration
{
    public function safeUp()
    {
        $this->insert('genre', [
            'id' => '1',
            'name' => 'неизвестен',
        ]);

        $this->insert('genre', [
            'id' => '2',
            'name' => 'romance',
        ]);

        $this->insert('genre', [
            'id' => '3',
            'name' => 'rock',
        ]);

        $this->insert('genre', [
            'id' => '4',
            'name' => 'pop',
        ]);

        $this->insert('genre', [
            'id' => '5',
            'name' => 'classic',
        ]);
    }

    public function safeDown()
    {
        $this->delete('{{%genre}}', ['id' => 0]);
    }
}
