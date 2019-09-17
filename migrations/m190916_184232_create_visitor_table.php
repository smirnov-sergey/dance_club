<?php

use yii\db\Migration;

class m190916_184232_create_visitor_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%visitor}}', [
            'id' => $this->primaryKey(11)->unsigned(),
            'name' => $this->string(255)->null(),
            'gender' => 'ENUM("m", "w")',
            'club_id' => $this->integer(11)->unsigned(),
            'company_id' => $this->integer(11)->unsigned(),
        ]);

        $this->addForeignKey(
            'FK_visitor_club_id',
            'visitor',
            'club_id',
            'club',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'FK_visitor_company_id',
            'visitor',
            'company_id',
            'company',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey(
            'FK_visitor_club_id',
            'visitor'
        );

        $this->dropForeignKey(
            'FK_visitor_company_id',
            'visitor'
        );

        $this->dropTable('{{%visitor}}');
    }
}
