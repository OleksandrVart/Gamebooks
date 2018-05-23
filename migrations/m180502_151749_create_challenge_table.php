<?php

use yii\db\Migration;

/**
 * Handles the creation of table `challenge`.
 */
class m180502_151749_create_challenge_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('challenge', [
            'id' => $this->primaryKey(),
            'paragraph_id' => $this->integer()->notNull(),
            'test_feature' => $this->string()->notNull(),
            'condition' => $this->boolean()->defaultValue('1'),
            'target_value' => $this->integer(),
            'target_mod_throw' => $this->integer(),
            'player_mod_value' => $this->integer(),
            'player_mod_throw' => $this->integer(),
            'tranzit_win' => $this->integer()->notNull(),
            'feature_change_win' => $this->string(),
            'item_change_win' => $this->string(),
            'tranzit_fail' => $this->integer(),
            'feature_change_fail' => $this->string(),
            'item_change_fail' => $this->string(),
        ]);
        
        $this->addForeignKey('fk_challenge_paragraph', 'challenge', 'paragraph_id', 'paragraph', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('challenge');
        $this->dropForeignKey( 'fk_challenge_paragraph', 'challenge');
    }
}
