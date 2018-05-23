<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "paragraph".
 *
 * @property int $id
 * @property int $book_id
 * @property int $number
 * @property string $type
 * @property string $text
 *
 * @property Challenge[] $challenges
 * @property Enemy[] $enemies
 * @property Book $book
 * @property Tranzit[] $tranzits
 */
class Paragraph extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'paragraph';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['book_id', 'number'], 'required'],
            [['book_id', 'number'], 'integer'],
            [['text'], 'string'],
            [['type'], 'string', 'max' => 15],
            [['book_id'], 'exist', 'skipOnError' => true, 'targetClass' => Book::className(), 'targetAttribute' => ['book_id' => 'id']],
            ['number', 'unique', 'filter' => function($query) {
                $query->where(['book_id' => $this->book_id]);
                $query->andWhere(['number' => $this->number]);
            }]
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
            'number' => 'Номер',
            'type' => 'Тип',
            'text' => 'Текст',
        ];
    }
    
    public function showTranzit($save) {
        $tran = $this->tranzits;
        $res = [];
        foreach ($tran as $v) {
            $feture = $this->checkFeature($save, $v);
            $item = $this->checkItem($save, $v);
            if ($feture and $item) {
                $res[] = $v;
            }
        }
        return $res;
    }
    
    protected function checkFeature($save, $tranz) {
        $feture = TRUE;
        if ($tranz->condition_feature) {
            $fea = explode(',', $tranz->condition_feature);
            $name = 'feature'.$fea[0];
            if ($fea[1] == '>') {
                if ($save->$name <= $fea[2]) {
                    $feture = FALSE;
                }
            } elseif ($fea[1] == '<') {
                if ($save->$name >= $fea[2]) {
                    $feture = FALSE;
                }
            } else {
                if ($save->$name != $fea[2]) {
                    $feture = FALSE;
                }
            }
        }
        return $feture;
    }
    
    protected function checkItem($save, $tranz) {
        $item = TRUE;
        if ($tranz->condition_item) {
            $nal = substr($tranz->condition_item, 0, 1);
            $it = substr($tranz->condition_item, 1);
            if ($nal == '-') {
                if (in_array($it, $save->getItem())) {
                    $item = FALSE;
                }
            } else {
                if (!in_array($it, $save->getItem())) {
                    $item = FALSE;
                }
            }
        }
        return $item;
    }



    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChallenge()
    {
        return $this->hasOne(Challenge::className(), ['paragraph_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnemy()
    {
        return $this->hasOne(Enemy::className(), ['paragraph_id' => 'id']);
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
    public function getTranzits()
    {
        return $this->hasMany(Tranzit::className(), ['paragraph_id' => 'id']);
    }
    
}
