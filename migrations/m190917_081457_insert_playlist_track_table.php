<?php

use yii\db\Migration;

class m190917_081457_insert_playlist_track_table extends Migration
{
    public function safeUp()
    {
        $this->insert('playlist_track', [
            'playlist_id' => '1',
            'track_id' => '1',
        ]);

        $this->insert('playlist_track', [
            'playlist_id' => '2',
            'track_id' => '2',
        ]);

        $this->insert('playlist_track', [
            'playlist_id' => '3',
            'track_id' => '3',
        ]);

        $this->insert('playlist_track', [
            'playlist_id' => '1',
            'track_id' => '4',
        ]);
    }

    public function safeDown()
    {
        $this->delete('{{%playlist_track}}', ['id' => 0]);
    }
}
