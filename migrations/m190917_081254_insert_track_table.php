<?php

use yii\db\Migration;

class m190917_081254_insert_track_table extends Migration
{
    public function safeUp()
    {
        $this->insert('track', [
            'id' => '1',
            'name' => '1',
            'genre_id' => '1',
        ]);

        $this->insert('track', [
            'id' => '2',
            'name' => '2',
            'genre_id' => '2',
        ]);

        $this->insert('track', [
            'id' => '3',
            'name' => '3',
            'genre_id' => '3',
        ]);

        $this->insert('track', [
            'id' => '4',
            'name' => '4',
            'genre_id' => '1',
        ]);
    }

    public function safeDown()
    {
        $this->delete('{{%track}}', ['id' => 0]);
    }
}
