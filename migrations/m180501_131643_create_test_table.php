<?php

use yii\db\Migration;

/**
 * Handles the creation of table `test`.
 */
class m180501_131643_create_test_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('test', [
            'id' => $this->primaryKey(),
            'hiden' => $this->boolean()->defaultValue('0')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('test');
    }
}
