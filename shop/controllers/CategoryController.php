<?php 
    namespace app\controllers;
    use app\models\Category;
use app\models\Product;
use Yii;
use yii\data\Pagination;

    class CategoryController extends AppController {
        public function actionIndex(){
            $new = Product::find()->where(['new'=>'1'])->limit(3)->all();
            $this->setMeta('Shop');
            return $this->render('index',compact('new'));
        }
        public function actionView($id){
            $id = Yii::$app->request->get('id');
           // $products = Product::find()->where(['category_id'=>$id])->all();
            $query = Product::find()->where(['category_id'=>$id]);
            $pages = new Pagination(['totalCount'=>$query->count(),'pagesize'=>1,'forcePageParam'=>false,'pageSizeParam'=>false]);
            $products = $query->offset($pages->offset)->limit($pages->limit)->all() ;
            $category = Category:: findOne($id);
            $this->setMeta($category->name,$category->keywords,$category->description);
            return $this->render('view',compact('products','pages','category'));
        }
    }
?>