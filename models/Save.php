<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "save".
 *
 * @property int $id
 * @property int $book_id
 * @property int $user_id
 * @property int $current_paragraph
 * @property int $feature1
 * @property int $feature2
 * @property int $feature3
 * @property int $feature4
 * @property int $feature5
 * @property int $feature6
 * @property string $items
 * @property int $damage
 *
 * @property Book $book
 * @property User $user
 */
class Save extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'save';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['book_id', 'user_id'], 'required'],
            [['book_id', 'user_id', 'current_paragraph', 'feature1', 'feature2', 'feature3', 'feature4', 'feature5', 'feature6', 'damage'], 'integer'],
            [['items'], 'string', 'max' => 255],
            [['book_id'], 'exist', 'skipOnError' => true, 'targetClass' => Book::className(), 'targetAttribute' => ['book_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'user_id' => 'User ID',
            'current_paragraph' => 'Current Paragraph',
            'feature1' => 'Feature1',
            'feature2' => 'Feature2',
            'feature3' => 'Feature3',
            'feature4' => 'Feature4',
            'feature5' => 'Feature5',
            'feature6' => 'Feature6',
            'items' => 'Items',
            'damage' => 'Damage',
        ];
    }
    
    public function changeFeature ($value) {
        $fea = explode(',', $value);
        if ($fea[0] == 'd') {
            if ($fea[1] == '+') {
                $this->damage += $fea[2];
            } elseif ($fea[1] == '-') {
                $this->damage -= $fea[2]; 
            }
        } else {
            $name = 'feature'.$fea[0];
            if ($fea[1] == '+') {
                $this->$name += $fea[2];
            } elseif ($fea[1] == '-') {
                $this->$name -= $fea[2]; 
            }
        }
    }

    public function changeItems ($value) {
        $change = substr($value, 0, 1);
        $item = substr($value, 1);
        if ($change == '+') {
            $this->items .= ';'.$item;
        } elseif ($change == '-') {
            $items = $this->getItem();
            $num = array_search($item, $items);
            unset($items[$num]);
            $this->items = implode(';', $items);
        }
    }

    public function getItem() {
        $res = explode(';', $this->items);
        return $res;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBook()
    {
        return $this->hasOne(Book::className(), ['id' => 'book_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
