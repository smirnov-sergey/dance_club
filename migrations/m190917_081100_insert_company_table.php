<?php

use yii\db\Migration;

class m190917_081100_insert_company_table extends Migration
{

    public function safeUp()
    {
        $this->insert('company', [
            'id' => '1',
            'name' => 'Без группы',
        ]);

        $this->insert('company', [
            'id' => '2',
            'name' => 'second',
        ]);

        $this->insert('company', [
            'id' => '3',
            'name' => 'third',
        ]);

        $this->insert('company', [
            'id' => '4',
            'name' => 'fourth',
        ]);

        $this->insert('company', [
            'id' => '5',
            'name' => 'fifth',
        ]);
    }

    public function safeDown()
    {
        $this->delete('{{%company}}', ['id' => 0]);
    }
}
