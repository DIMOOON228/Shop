<?php 
    namespace app\controllers;
    use app\models\Category;
use app\models\Product;
use Yii;
use yii\data\Pagination;

    class CategoryController extends AppController {
        public function actionIndex(){
            $new = Product::find()->where(['new'=>'1'])->limit(6)->all();
            $sale = Product::find()->where(['sale'=>'1'])->limit(6)->all();
            $this->setMeta('Shop');
            return $this->render('index',compact('new','sale'));
        }
        public function actionView($id){
           // $id = Yii::$app->request->get('id');
           
            $category = Category::findOne($id);
           // $products = Product::find()->where(['category_id'=>$id])->all();
            $query = Product::find()->where(['category_id'=>$id]);
            $pages = new Pagination(['totalCount'=>$query->count(),'pagesize'=>2,'forcePageParam'=>false,'pageSizeParam'=>false]);
            $products = $query->offset($pages->offset)->limit($pages->limit)->all() ;
            $category = Category:: findOne($id);
            $this->setMeta($category->name,$category->keywords,$category->description);
            if(empty($category))
            throw new \yii\web\HttpException(404,'Такой категории нет');
            return $this->render('view',compact('products','pages','category'));
        }

        public function actionSearch(){
            $q =trim(Yii::$app->request->get('q'));
            if(!$q)
                return $this->render('search');
            $query = Product::find()->where(['like','name',$q]);
            $pages = new Pagination(['totalCount'=>$query->count(),'pagesize'=>2,'forcePageParam'=>false,'pageSizeParam'=>false]);
            $products = $query->offset($pages->offset)->limit($pages->limit)->all() ;
            return $this->render('search',compact('products','pages','q'));
        }
    }
?>
