<?php

use yii\db\Migration;

/**
 * Handles the creation of table `player_list`.
 */
class m180428_185307_create_player_list_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {
        $this->createTable('player_list', [
            'id' => $this->primaryKey(),
            'book_id' => $this->integer()->notNull(),
            'feature1_name' => $this->string(30),
            'feature1_value_basic' => $this->integer(),
            'feature1_mod_throw' => $this->integer(),
            'feature2_name' => $this->string(30),
            'feature2_value_basic' => $this->integer(),
            'feature2_mod_throw' => $this->integer(),
            'feature3_name' => $this->string(30),
            'feature3_value_basic' => $this->integer(),
            'feature3_mod_throw' => $this->integer(),
            'feature4_name' => $this->string(30),
            'feature4_value_basic' => $this->integer(),
            'feature4_mod_throw' => $this->integer(),
            'feature5_name' => $this->string(30),
            'feature5_value_basic' => $this->integer(),
            'feature5_mod_throw' => $this->integer(),
            'feature6_name' => $this->string(30),
            'feature6_value_basic' => $this->integer(),
            'feature6_mod_throw' => $this->integer(),
            'items' => $this->string(),
            'damage' => $this->integer()
        ]);

        $this->addForeignKey('fk_player_list_book', 'player_list', 'book_id', 'book', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function Down()
    {
        $this->dropTable('player_list');
        $this->dropForeignKey( 'fk_player_list_book', 'player_list');
    }
}
