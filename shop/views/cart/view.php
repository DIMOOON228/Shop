<?php
    
    use yii\helpers\Html;
    use yii\helpers\Url;
    use yii\widgets\ActiveForm;
   
?>
<div class="container">
<?php if(Yii::$app->session->hasFlash('success') ): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <buuton type="button" class="close" data-dismiss="alert" aria-lable="Close"><span aria-hidden="true">&times;</span></buuton> 
    <?php echo Yii::$app->session->getFlash('success'); ?>
    </div>
<?php endif; ?>    

<?php if(Yii::$app->session->hasFlash('error') ): ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <buuton type="button" class="close" data-dismiss="alert" aria-lable="Close"><span aria-hidden="true">&times;</span></buuton> 
    <?php echo Yii::$app->session->getFlash('error'); ?>
    </div>
<?php endif; ?>         
<?php if(!empty($session['cart'])):?>
    <div class="table-responsive">
        <table class="table-hover table-striped">
            <thead>
                <tr>
                    <th>Фото</th>
                    <th>Наименование</th>
                    <th>Количество</th>
                    <th>Цена</th>
                    <th>Сума</th>
                    <th><i class="bi bi-x-circle">Удалить</i></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($session['cart'] as $id=>$item ): ?>
                <tr>
                    <td><?= \yii\helpers\Html::img("{$item['img']}",['alt'=>$item['name'],'height'=>50])?></a</td>
                    <td><a href="<?=Url::to(['product/view','id'=>$id])?>"><?= $item['name'] ?></a></td>
                    <td><?= $item['qty'] ?></td>
                    <td><?= $item['price'] ?></td>
                    <td><?=$item['qty']* $item['price'] ?></td>
                    <td><i data-id="<?= $id?>" class="bi bi-x-circle text-danger del-item"> X</i></td>
                    </tr>
            <?php endforeach  ?>  
                    <tr>
                        <td colspan="5">Итого:</td>
                        <td><?= $session['cart.qty'] ?></td>
                      </tr>
                      <tr>
                        <td colspan="5">На сумму:</td>
                        <td><?= $session['cart.sum'] ?> USD</td>
                      </tr>
            </tbody>
        </table>
    </div>
    <hr/>
    <?php $form= ActiveForm::begin() ?>
                <?= $form->field($order,'name')?>
                <?= $form->field($order,'email')?>
                <?= $form->field($order,'phone')?>
                <?= $form->field($order,'address')?>
                <?= Html::submitButton('Заказать',['class'=>'btn btn-success']) ?>
    <?php ActiveForm::end() ?>
    <?php  else:  ?>
    <h3>корзина пуста</h3>
    <?php endif;  ?>
</div>