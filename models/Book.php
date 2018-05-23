<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property string $tittle
 * @property string $cover
 * @property string $author
 * @property string $annotation
 * @property int $min_dice
 * @property int $max_dice
 * @property string $game_model
 * @property int $created_by
 *
 * @property User $createdBy
 * @property BookGenre[] $bookGenres
 * @property Paragraph[] $paragraphs
 * @property PlayerList[] $playerLists
 * @property Save[] $saves
 */
class Book extends \yii\db\ActiveRecord
{
    public $imageFile;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'book';
    }
    
    public function behaviors ()
    {
    return [
         [
            'class' => BlameableBehavior::className(),
            'createdByAttribute' => 'created_by' ,
            'updatedByAttribute' => 'updated_by' ,
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tittle',  'game_model'], 'required'],
            [['annotation'], 'string'],
            [['min_dice', 'max_dice', 'created_by'], 'integer'],
            [['tittle', 'cover', 'author', 'game_model'], 'string', 'max' => 128],
            [['tittle'], 'unique'],
            [['hiden'], 'boolean'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tittle' => 'Название',
            'cover' => 'Обложка',
            'author' => 'Автор',
            'annotation' => 'Аннотация',
            'min_dice' => 'Кубик от',
            'max_dice' => 'Кубик до',
            'game_model' => 'Игровая модель',
            'hiden' => 'Отображать книгу всем',
            'created_by' => 'Создано',
            'updated_by' => 'Обновлено',
            'imageFile' => 'Обложка',
        ];
    }
    
    public function upload ()
    {
        if ( $this ->validate()) {
            $filePath = 'uploads/' . $this ->imageFile->baseName . '.' . $this ->imageFile->extension;
            $this ->imageFile->saveAs( $filePath );
            $this ->imageFile = null ;
            $this ->cover = $filePath ;
            return true ;
        } else {
            return false ;
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
    
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
    

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookGenres()
    {
        return $this->hasMany(BookGenre::className(), ['book_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParagraphs()
    {
        return $this->hasMany(Paragraph::className(), ['book_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlayerLists()
    {
        return $this->hasMany(PlayerList::className(), ['book_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSaves()
    {
        return $this->hasMany(Save::className(), ['book_id' => 'id']);
    }
}
