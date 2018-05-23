<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "player_list".
 *
 * @property int $id
 * @property int $book_id
 * @property string $feature1_name
 * @property int $feature1_value_basic
 * @property int $feature1_mod_throw
 * @property string $feature2_name
 * @property int $feature2_value_basic
 * @property int $feature2_mod_throw
 * @property string $feature3_name
 * @property int $feature3_value_basic
 * @property int $feature3_mod_throw
 * @property string $feature4_name
 * @property int $feature4_value_basic
 * @property int $feature4_mod_throw
 * @property string $feature5_name
 * @property int $feature5_value_basic
 * @property int $feature5_mod_throw
 * @property string $feature6_name
 * @property int $feature6_value_basic
 * @property int $feature6_mod_throw
 * @property string $items
 * @property int $damage
 *
 * @property Book $book
 */
class PlayerList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'player_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['book_id'], 'required'],
            [['book_id', 'feature1_value_basic', 'feature1_mod_throw', 'feature2_value_basic', 'feature2_mod_throw', 'feature3_value_basic', 'feature3_mod_throw', 'feature4_value_basic', 'feature4_mod_throw', 'feature5_value_basic', 'feature5_mod_throw', 'feature6_value_basic', 'feature6_mod_throw', 'damage'], 'integer'],
            [['feature1_name', 'feature2_name', 'feature3_name', 'feature4_name', 'feature5_name', 'feature6_name'], 'string', 'max' => 30],
            [['items'], 'string', 'max' => 255],
            [['book_id'], 'exist', 'skipOnError' => true, 'targetClass' => Book::className(), 'targetAttribute' => ['book_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'book_id' => 'Book ID',
            'feature1_name' => 'Название характеристики 1',
            'feature1_value_basic' => 'Базовое значение характеристики 1',
            'feature1_mod_throw' => 'Бросков кубика для характеристики 1',
            'feature2_name' => 'Название характеристики 2',
            'feature2_value_basic' => 'Базовое значение характеристики 2',
            'feature2_mod_throw' => 'Бросков кубика для характеристики 2',
            'feature3_name' => 'Название характеристики 3',
            'feature3_value_basic' => 'Базовое значение характеристики 3',
            'feature3_mod_throw' => 'Бросков кубика для характеристики 3',
            'feature4_name' => 'Название характеристики 4',
            'feature4_value_basic' => 'Базовое значение характеристики 4',
            'feature4_mod_throw' => 'Бросков кубика для характеристики 4',
            'feature5_name' => 'Название характеристики 5',
            'feature5_value_basic' => 'Базовое значение характеристики 5',
            'feature5_mod_throw' => 'Бросков кубика для характеристики 5',
            'feature6_name' => 'Название характеристики 6',
            'feature6_value_basic' => 'Базовое значение характеристики 6',
            'feature6_mod_throw' => 'Бросков кубика для характеристики 6',
            'items' => 'Предметы и эффекты',
            'damage' => 'Наносимый урон',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBook()
    {
        return $this->hasOne(Book::className(), ['id' => 'book_id']);
    }
    
    public function throwDice($count)
    {
        $min = $this->book->min_dice;
        $max = $this->book->max_dice;
        $dice = 0;
        for ($i=0; $i<$count; $i++){
            $dice += rand($min, $max);
        }
        
        return $dice;
    }
    
    protected function generateFeature ($name, $value, $mod) {
        if ($this->$name) {
            $feature = $this->$value + $this->throwDice($this->$mod);
            return $feature;
        }
    }


    public function generateList() {
        $nameList = [];
        for ($i=1; $i<7; $i++){
            $name = 'feature'.$i;
            $nameList[] = $name;
            $$name = $this->generateFeature($name.'_name', $name.'_value_basic', $name.'_mod_throw');
        }
        $items = $this->items;
        $damage = $this->damage;
        $gameList = compact($nameList, 'items', 'damage');
        return $gameList;
    }
    
    public function featureList($save) {
        $list =[];
        for ($i=1; $i<7; $i++){
            $name = 'feature'.$i.'_name';
            $value = 'feature'.$i;
                if ($this->$name) {
                    $list[] = $this->$name . ' - ' . $save->$value . '<br>'; 
            }
            
        }
        return $list;
    }
}
