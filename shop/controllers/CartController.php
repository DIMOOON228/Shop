<?php
    namespace app\controllers;
    use Yii;
    use app\models\Product;
    use app\models\Cart;
    use app\models\Order;
    use app\models\OrderItems;



    class CartController extends AppController{
        public function actionAdd(){
            $id = Yii::$app->request->get('id');
            $product = Product::findOne($id);
            if(empty($product)) return false;
            $session = Yii::$app->session;
            $session->open();
            $cart = new Cart();
            $cart->addToCart($product);
            $this->layout = false;
            return $this->render('cart-modal',compact('session'));
        }
        public function actionClear(){
            $session = Yii::$app->session;
            $session->open();
            $session->remove('cart');
            $session->remove('cart.qty');
            $session->remove('cart.sum');
            //yii::info($session);
            $this->layout= false;
            return $this->render('cart-modal',compact('session'));
        }
        public function actionDelItem(){
            $id = Yii::$app->request->get('id');
            $session = Yii::$app->session;
            $session->open();
            $cart = new Cart();
            $cart->recalc($id);
            $this->layout= false;
            return $this->render('cart-modal',compact('session'));

        }
        public function actionShow(){
            //$id = Yii::$app->request->get('id');
            $session = Yii::$app->session;
            $session->open();
            $this->layout= false;
            return $this->render('cart-modal',compact('session'));
        }
        public function actionView(){
            $session = Yii::$app->session;
            $session->open();
            $this->setMeta('Козина');
            $order = new Order();
            if ($order->load(Yii::$app->request->post()) ){
                $order->qty= $session['cart.qty'];
                $order->sum= $session['cart.sum'];
                if($order->save()){
                    $this->saveOrderItems($session['cart'],$order->id) ;
                    Yii::$app->session->setFlash('success','Ваш заказ принят, 
                    наш менеджер скоро свяжеться  с вами');
                    Yii::$app->mailer->compose('order',['session'=>$session])
                        ->setFrom('nata.kondratyuk84@ukr.net')
                        ->setTo($order->email)
                        ->setSubject('Заказ')
                        ->send();
                    $session->remove('cart');
                    $session->remove('cart.qty');
                    $session->remove('cart.sum');
                    return $this->refresh();
                }else{
                    Yii::$app->session->setFlash('error','Ошибка оформления заказа');
                }
            }
            return $this->render('view',compact('session','order'));
        }
        protected function saveOrderItems($items,$order_id){
            foreach($items as $id=>$item){
                $order_items = new OrderItems();
                $order_items->order_id = $order_id;
                $order_items->product_id = $id;
                $order_items->name = $item['name'];
                $order_items->price = $item['price'];
                $order_items->qty_item = $item['qty'];
                $order_items->sum_item = $item['qty']*$item['price'];
                $order_items->save();
            }
        }
    }
?>