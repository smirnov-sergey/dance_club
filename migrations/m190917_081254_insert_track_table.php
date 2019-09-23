<?php

use yii\db\Migration;

class m190917_081254_insert_track_table extends Migration
{
    public function safeUp()
    {
        $this->insert('track', [
            'id' => '1',
            'name' => 'track #1',
            'duration' => '120',
            'genre_id' => '2',
        ]);

        $this->insert('track', [
            'id' => '2',
            'name' => 'track #2',
            'duration' => '180',
            'genre_id' => '3',
        ]);

        $this->insert('track', [
            'id' => '3',
            'name' => 'track #3',
            'duration' => '300',
            'genre_id' => '4',
        ]);

        $this->insert('track', [
            'id' => '4',
            'name' => 'track #4',
            'duration' => '600',
            'genre_id' => '5',
        ]);
    }

    public function safeDown()
    {
        $this->delete('{{%track}}', ['id' => 0]);
    }
}
