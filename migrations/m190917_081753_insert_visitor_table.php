<?php

use yii\db\Migration;

class m190917_081753_insert_visitor_table extends Migration
{
    public function safeUp()
    {
        $this->insert('visitor', [
            'id' => '1',
            'name' => 'Anton',
            'gender' => 'm',
            'club_id' => '1',
            'company_id' => '1',
        ]);

        $this->insert('visitor', [
            'id' => '2',
            'name' => 'Bella',
            'gender' => 'w',
            'club_id' => '1',
            'company_id' => '1',
        ]);

        $this->insert('visitor', [
            'id' => '3',
            'name' => 'Vlad',
            'gender' => 'm',
            'club_id' => '2',
            'company_id' => '2',
        ]);

        $this->insert('visitor', [
            'id' => '4',
            'name' => 'Galla',
            'gender' => 'w',
            'club_id' => '2',
            'company_id' => '2',
        ]);
    }

    public function safeDown()
    {
        $this->delete('{{%visitor}}', ['id' => 0]);
    }
}
