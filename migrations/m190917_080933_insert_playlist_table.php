<?php

use yii\db\Migration;

class m190917_080933_insert_playlist_table extends Migration
{
    public function safeUp()
    {
        $this->insert('playlist', [
            'id' => '1',
            'name' => 'playlist #1',
        ]);

        $this->insert('playlist', [
            'id' => '2',
            'name' => 'playlist #2',
        ]);

        $this->insert('playlist', [
            'id' => '3',
            'name' => 'playlist #3',
        ]);

        $this->insert('playlist', [
            'id' => '4',
            'name' => 'playlist #4',
        ]);
    }

    public function safeDown()
    {
        $this->delete('{{%playlist}}', ['id' => 0]);
    }  
}
