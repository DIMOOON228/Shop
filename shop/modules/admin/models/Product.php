<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string|null $content
 * @property float $price
 * @property float $old_price
 * @property string|null $keywords
 * @property string|null $description
 * @property string|null $img
 * @property string $new
 * @property string $sale
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $image;
    public $gallery;
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    public static function tableName()
    {
        return 'product';
    }
    public function getCategory(){
        return $this->hasOne(Category::className(),['id'=>'category_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'name'], 'required'],
            [['category_id'], 'integer'],
            [['content', 'new', 'sale','top','hits'], 'string'],
            [['price', 'old_price'], 'number'],
            [['name', 'keywords', 'description', 'img'], 'string', 'max' => 255],
            [['image'], 'file',  'extensions' => 'png, jpg'],
            [['gallery'], 'file',  'extensions' => 'png, jpg', 'maxFiles' => 3],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID товара ',
            'category_id' => 'Категория',
            'name' => 'Имя',
            'content' => 'Контент',
            'price' => 'Цена',
            'old_price' => 'Старая цена',
            'keywords' => 'Ключевые слова',
            'description' => 'Мета-описание',
            'image' => 'Фото',
            'galery'=> 'Галерея',
            'new' => 'Новинка',
            'sale' => 'Распродажа',
            'top' => 'TOP',
            'hits' => 'Хиты продаж',
        ];
    }
    public function upload(){
        if($this->validate()){
            $path = 'upload/store/' . $this->image->baseName . '.' . $this->image->extension;
            $this->image->saveAs($path);
            $this->attachImage($path,true);
            @unlink($path);
            return true;
        }else{
            return false;
        }
    }
    public function uploadGallery(){
        if($this->validate()){
            foreach($this->gallery as $file){
                $path = 'upload/store/' .$file->baseName . '.' . $file->extension;
                $file->saveAs($path);
                $this->attachImage($path);
                @unlink($path);
            }
            return true;
        }else{
            return false;
        }
    }
}
