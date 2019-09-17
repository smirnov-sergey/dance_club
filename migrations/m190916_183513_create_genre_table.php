<?php

use yii\db\Migration;

class m190916_183513_create_genre_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%genre}}', [
            'id' => $this->primaryKey(11)->unsigned(),
            'name' => $this->string(255)->null(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%genre}}');
    }
}
