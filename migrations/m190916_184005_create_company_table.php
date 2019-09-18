<?php

use yii\db\Migration;

class m190916_184005_create_company_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%company}}', [
            'id' => $this->primaryKey(11)->unsigned(),
            'name' => $this->string(255)->defaultValue('Без группы'),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%company}}');
    }
}
