<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tranzit`.
 */
class m180502_151815_create_tranzit_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {
        $this->createTable('tranzit', [
            'id' => $this->primaryKey(),
            'paragraph_id' => $this->integer()->notNull(),
            'tranzit_text' => $this->string(),
            'tranzit_number' => $this->integer(),
            'condition_feature' => $this->string(),
            'condition_item' => $this->string(),
            'feature_change' => $this->string(),
            'item_change' => $this->string(),
        ]);
        
        $this->addForeignKey('fk_tranzit_paragraph', 'tranzit', 'paragraph_id', 'paragraph', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function Down()
    {
        $this->dropTable('tranzit');
        $this->dropForeignKey( 'fk_tranzit_paragraph', 'tranzit');
    }
}
