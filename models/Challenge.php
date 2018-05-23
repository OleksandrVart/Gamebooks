<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "challenge".
 *
 * @property int $id
 * @property int $paragraph_id
 * @property string $test_feature
 * @property int $condition
 * @property int $target_value
 * @property int $target_mod_throw
 * @property int $player_mod_value
 * @property int $player_mod_throw
 * @property int $tranzit_win
 * @property string $feature_change_win
 * @property string $item_change_win
 * @property int $tranzit_fail
 * @property string $feature_change_fail
 * @property string $item_change_fail
 *
 * @property Paragraph $paragraph
 */
class Challenge extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'challenge';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['paragraph_id', 'tranzit_win'], 'required'],
            [['paragraph_id', 'target_value', 'target_mod_throw', 'player_mod_value', 'player_mod_throw', 'tranzit_win', 'tranzit_fail'], 'integer'],
            [['test_feature', 'feature_change_win', 'item_change_win', 'feature_change_fail', 'item_change_fail'], 'string', 'max' => 255],
            [['condition'], 'string', 'max' => 1],
            [['paragraph_id'], 'exist', 'skipOnError' => true, 'targetClass' => Paragraph::className(), 'targetAttribute' => ['paragraph_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'paragraph_id' => 'Paragraph ID',
            'test_feature' => 'Номер характеристики для проверки',
            'condition' => 'Условие: больше или мельше',
            'target_value' => 'Значение проверки',
            'target_mod_throw' => 'Бросков кубика для проверки',
            'player_mod_value' => 'Модификатор характеристики игрока',
            'player_mod_throw' => 'Бросков кубика игроку',
            'tranzit_win' => 'Переход на номер при успехе',
            'feature_change_win' => 'Изменения характеристик при успехе',
            'item_change_win' => 'Изменение предметов и эффектов при успехе',
            'tranzit_fail' => 'Переход на номер при провале',
            'feature_change_fail' => 'Изменения характеристик при провале',
            'item_change_fail' => 'Изменение предметов и эффектов при провале',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParagraph()
    {
        return $this->hasOne(Paragraph::className(), ['id' => 'paragraph_id']);
    }
    
    
    public function throwDice($count)
    {
        $min = $this->paragraph->book->min_dice;
        $max = $this->paragraph->book->max_dice;
        $dice = 0;
        for ($i=0; $i<$count; $i++){
            $dice += rand($min, $max);
        }
        return $dice;
    }
    
    public function runChallenge($save) {
        $player = 0;
        if ($this->test_feature) {
            $name = 'feature'.$this->test_feature;
            $player = $save->$name;
        }
        $player = $player + $this->player_mod_value + $this->throwDice($this->player_mod_throw);
        $target = $this->target_value + $this->throwDice($this->target_mod_throw);
        if ($this->condition == '>') {
            if ($player > $target) {
                $route = $this->tranzitWin();
            } else {
                $route = $this->tranzitFail();
            }
        } else {
            if ($player < $target) {
                $route = $this->tranzitWin();
            } else {
                $route = $this->tranzitFail();
            }
        }
        return $route;
    }
    
    protected function tranzitWin() {
        $route = [1];
        $route[] = $this->tranzit_win;
        $route[] = $this->feature_change_win;
        $route[] = $this->item_change_win;
        return $route;
    }
    
    protected function tranzitFail() {
        $route = [0];
        $route[] = $this->tranzit_fail;
        $route[] = $this->feature_change_fail;
        $route[] = $this->item_change_fail;
        return $route;
    }
}