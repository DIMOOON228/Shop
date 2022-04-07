<?php
namespace app\controllers;
use app\models\Category;
use app\models\Product;
use Yii;

class ProductController extends AppController{
    public function actionView($id){
        //$id = Yii::$app->request->get('id');
        $product = Product::findOne($id);

        //$product = Product::find()->with('category')->where(['id'=>$id])->limit(1)->one()
        $new = Product::find()->where(['new'=>'1'])->limit(6)->all();
        $sale = Product::find()->where(['sale'=>'1'])->limit(6)->all();
        $hits = Product::find()->where(['hits'=>'1'])->limit(3)->all();
        $this->setMeta($product->name,$product->keywords,$product->description);
        if(empty($product))
        throw new \yii\web\HttpException(404,'Такого продукта нет');
        return $this->render('view',compact('product','new','sale','hits'));

        //$sale = Product::find()->where(['sale'=>'1'])->limit(6)->all();
        //$this->setMeta($product->name,$product->keywords,$product->description);
        //if(empty($product))
        //throw new \yii\web\HttpException(404,'Такого продукта нет');
        //return $this->render('view',compact('product','sale'));
    }

}
?>