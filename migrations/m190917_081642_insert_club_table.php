<?php

use yii\db\Migration;

class m190917_081642_insert_club_table extends Migration
{
    public function safeUp()
    {
        $this->insert('club', [
            'id' => '1',
            'name' => 'Не клуб',
            'playlist_id' => '1',
        ]);

        $this->insert('club', [
            'id' => '2',
            'name' => 'alfa',
            'playlist_id' => '1',
        ]);

        $this->insert('club', [
            'id' => '3',
            'name' => 'beta',
            'playlist_id' => '2',
        ]);

        $this->insert('club', [
            'id' => '4',
            'name' => 'gama',
            'playlist_id' => '3',
        ]);

        $this->insert('club', [
            'id' => '5',
            'name' => 'delta',
            'playlist_id' => '2',
        ]);
    }

    public function safeDown()
    {
        $this->delete('{{%club}}', ['id' => 0]);
    }
}
