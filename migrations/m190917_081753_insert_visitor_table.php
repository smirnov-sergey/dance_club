<?php

use yii\db\Migration;

class m190917_081753_insert_visitor_table extends Migration
{
    public function safeUp()
    {
        $this->insert('visitor', [
            'id' => '1',
            'name' => 'Anton',
            'gender' => 'мужской',
            'club_id' => '2',
            'company_id' => '2',
        ]);

        $this->insert('visitor', [
            'id' => '2',
            'name' => 'Bella',
            'gender' => 'женский',
            'club_id' => '2',
            'company_id' => '2',
        ]);

        $this->insert('visitor', [
            'id' => '3',
            'name' => 'Vlad',
            'gender' => 'мужской',
            'club_id' => '3',
            'company_id' => '3',
        ]);

        $this->insert('visitor', [
            'id' => '4',
            'name' => 'Galla',
            'gender' => 'женский',
            'club_id' => '3',
            'company_id' => '3',
        ]);

        $this->insert('visitor', [
            'id' => '5',
            'name' => 'Denis',
            'gender' => 'мужской',
            'club_id' => '5',
            'company_id' => null,
        ]);

        $this->insert('visitor', [
            'id' => '6',
            'name' => 'Elena',
            'gender' => 'женский',
            'club_id' => '5',
            'company_id' => null,
        ]);

        $this->insert('visitor', [
            'id' => '7',
            'name' => 'Fry',
            'gender' => 'мужской',
            'club_id' => '1',
            'company_id' => null,
        ]);

        $this->insert('visitor', [
            'id' => '8',
            'name' => 'George',
            'gender' => 'мужской',
            'club_id' => '4',
            'company_id' => null,
        ]);

        $this->insert('visitor', [
            'id' => '9',
            'name' => 'Hovard',
            'gender' => 'мужской',
            'club_id' => '2',
            'company_id' => '4',
        ]);

        $this->insert('visitor', [
            'id' => '10',
            'name' => 'Jay',
            'gender' => 'женский',
            'club_id' => '2',
            'company_id' => '4',
        ]);
    }

    public function safeDown()
    {
        $this->delete('{{%visitor}}', ['id' => 0]);
    }
}
