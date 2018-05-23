<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tranzit".
 *
 * @property int $id
 * @property int $paragraph_id
 * @property string $tranzit_text
 * @property int $tranzit_number
 * @property string $condition_feature
 * @property string $condition_item
 * @property string $feature_change
 * @property string $item_change
 *
 * @property Paragraph $paragraph
 */
class Tranzit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tranzit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['paragraph_id'], 'required'],
            [['paragraph_id', 'tranzit_number'], 'integer'],
            [['tranzit_text', 'condition_feature', 'condition_item', 'feature_change', 'item_change'], 'string', 'max' => 255],
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
            'tranzit_text' => 'Текст перехода',
            'tranzit_number' => 'Номер параграфа-цели',
            'condition_feature' => 'Условие перехода: характеристики',
            'condition_item' => 'Условия перехода: предметы и эффекты',
            'feature_change' => 'Изменения характеристик',
            'item_change' => 'изменения предметов и эффектов',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParagraph()
    {
        return $this->hasOne(Paragraph::className(), ['id' => 'paragraph_id']);
    }
}
