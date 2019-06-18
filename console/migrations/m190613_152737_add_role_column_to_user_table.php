<?php

use yii\db\Migration;

/**
 * Handles adding role to table `{{%user}}`.
 */
class m190613_152737_add_role_column_to_user_table extends Migration
{
    public function up()
    {
        return $this->addColumn('{{%user}}','role',$this->string()->defaultValue("user"));
    }

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
