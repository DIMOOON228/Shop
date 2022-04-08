<?php

namespace app\modules\admin\models;

use app\models\Category as ModelsCategory;
use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $name
 * @property string|null $keywords
 * @property string|null $description
 */
class Category extends \yii\db\ActiveRecord
{
    public $image;
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    public function getCategory(){
        return $this->hasOne(Category::className(),['id'=>'parent_id']);
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['name'], 'required'],
            [['name', 'keywords', 'description'], 'string', 'max' => 255],
            [['image'], 'file',  'extensions' => 'png, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '№ категории',
            'parent_id' => 'Родительская категория',
            'name' => 'Название',
            'keywords' => 'Ключевые слова',
            'description' => 'Мета Описание',
            'image' => 'Фото',
        ];
    }
    public function upload(){
        if($this->validate()){
            $path = 'upload/store/'. $this->image->baseName .'.'.$this->image->extension;
            $this->image->saveAs($path);
            $this->attachImage($path);
            @unlink($path);
            return true;
        }else{
            return false;
        }
    }
}
