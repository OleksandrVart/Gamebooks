<?php

use yii\db\Migration;

/**
 * Handles the creation of table `enemy`.
 */
class m180502_151703_create_enemy_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {
        $this->createTable('enemy', [
            'id' => $this->primaryKey(),
            'paragraph_id' => $this->integer()->notNull(),
            'enemy_name' => $this->string()->notNull(),
            'hp' => $this->integer(),
            'attack_feature' => $this->integer(),
            'enemy_damage' => $this->integer(),
            'count_throw' => $this->integer(),
            'tranzit_win' => $this->integer()->notNull(),
            'tranzit_fail' => $this->integer(),
        ]);
        
        $this->addForeignKey('fk_enemy_paragraph', 'enemy', 'paragraph_id', 'paragraph', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function Down()
    {
        $this->dropTable('enemy');
        $this->dropForeignKey( 'fk_enemy_paragraph', 'enemy');
    }
}
