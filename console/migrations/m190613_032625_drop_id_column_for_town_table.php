<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `{{%id_column_for_town}}`.
 */
class m190613_032625_drop_id_column_for_town_table extends Migration
{
    public function up(){
        $this->dropColumn('{{%town}}','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropTable('{{%id_column_for_town}}');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->createTable('{{%id_column_for_town}}', [
            'id' => $this->primaryKey(),
        ]);
    }
}
