<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

<h1>Просмотр товара №<?= $model->id ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php if(Yii::$app->session->hasFlash('success') ): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <buuton type="button" class="close" data-dismiss="alert" aria-lable="Close"><span aria-hidden="true">&times;</span></buuton> 
    <?php echo Yii::$app->session->getFlash('success'); ?>
    </div>
<?php endif; ?> 
<?php $img= $model->getImage(); ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            //'category_id',
            [
                'attribute' => 'category_id',
                'value' =>  $model->category->name ,
            ],
            'name',
            'content:html',
            'price',
            'old_price',
            'keywords',
            'description',
            [
                'attribute'=>'image',
                'value' =>"<img src='{$img->getUrl()}'>",
                'format'=>'html',
            ],
            [
                'attribute'=>'new',
                'value' => !$model->new ? '<span class="text-danger">Нет</span>' : '<span class="text-success">Да</span>',
                'format'=> 'html'
            ],
            [
                'attribute'=>'sale',
                'value' => !$model->sale ? '<span class="text-danger">Нет</span>' : '<span class="text-success">Да</span>',
                'format'=> 'html'
            ],
            [
                'attribute'=>'top',
                'value' => !$model->top ? '<span class="text-danger">Нет</span>' : '<span class="text-success">Да</span>',
                'format'=> 'html'
            ],
            [
                'attribute'=>'hits',
                'value' => !$model->hits ? '<span class="text-danger">Нет</span>' : '<span class="text-success">Да</span>',
                'format'=> 'html'
            ],
        ],
    ]) ?>

</div>
