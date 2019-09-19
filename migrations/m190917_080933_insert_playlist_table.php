<?php

use yii\db\Migration;

class m190917_080933_insert_playlist_table extends Migration
{
    public function safeUp()
    {
        $this->insert('playlist', [
            'id' => '1',
            'name' => 'romance',
        ]);

        $this->insert('playlist', [
            'id' => '2',
            'name' => 'rock',
        ]);

        $this->insert('playlist', [
            'id' => '3',
            'name' => 'pop',
        ]);

        $this->insert('playlist', [
            'id' => '4',
            'name' => 'classic',
        ]);
    }

    public function safeDown()
    {
        $this->delete('{{%playlist}}', ['id' => 0]);
    }  
}
