<?php

use yii\db\Migration;

class m190917_081642_insert_club_table extends Migration
{
    public function safeUp()
    {
        $this->insert('club', [
            'id' => '1',
            'name' => '1',
            'playlist_id' => '1',
        ]);

        $this->insert('club', [
            'id' => '2',
            'name' => '2',
            'playlist_id' => '2',
        ]);

        $this->insert('club', [
            'id' => '3',
            'name' => '3',
            'playlist_id' => '3',
        ]);

        $this->insert('club', [
            'id' => '4',
            'name' => '4',
            'playlist_id' => '1',
        ]);
    }

    public function safeDown()
    {
        $this->delete('{{%club}}', ['id' => 0]);
    }
}
