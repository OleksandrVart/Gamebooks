<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "enemy".
 *
 * @property int $id
 * @property int $paragraph_id
 * @property string $enemy_name
 * @property int $hp
 * @property int $attack_feature
 * @property int $enemy_damage
 * @property int $count_throw
 * @property int $tranzit_win
 * @property int $tranzit_fail
 *
 * @property Paragraph $paragraph
 */
class Enemy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'enemy';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['paragraph_id', 'enemy_name', 'tranzit_win'], 'required'],
            [['paragraph_id', 'hp', 'attack_feature', 'enemy_damage', 'count_throw', 'tranzit_win', 'tranzit_fail'], 'integer'],
            [['enemy_name'], 'string', 'max' => 255],
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
            'enemy_name' => 'Имя или название противника',
            'hp' => 'Очки жизни',
            'attack_feature' => 'Значение атакующей характеристики',
            'enemy_damage' => 'Наносимый урон',
            'count_throw' => 'Количество бросков кубика',
            'tranzit_win' => 'Переход при победе',
            'tranzit_fail' => 'Переход при поражении',
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
    
    public function fight($save) {
        $playerHP = $save->feature1;
        $enemyHP = $this->hp;
        $playerFea = 0;
        $enemyAttack = $this->attack_feature;
        if ($save->feature2) {
            $playerFea = $save->feature2;
        }
        $takenDamage = 0;
        while (($enemyHP > 0) && ($playerHP > 0)) {
            $playerAttack = $playerFea + $this->throwDice($this->count_throw);
            if ($playerAttack > $enemyAttack) {
                $enemyHP -= $save->damage;
                echo "Вы нанесли удар (атака - $playerAttack)<br>";
            } elseif ($playerAttack < $enemyAttack) {
                $playerHP -= $this->enemy_damage;
                $takenDamage += $this->enemy_damage;
                echo "Вы получаете удар (атака - $playerAttack)<br>";
            }
        }
        if ($enemyHP <= 0) {
            echo "Получено урона - $takenDamage<br> <div class = 'message'>Вы победили!</div> ";
            $route = [1];
            $route[] = $this->tranzit_win;
            $route[] = "1,-,$takenDamage";
        } else {
            echo "<div class = 'message'>Вы програли!</div>";
            $route = [0];
            $route[] = $this->tranzit_fail;
            $route[] = "1,-,$takenDamage";
        }
    return $route;
    }
}
