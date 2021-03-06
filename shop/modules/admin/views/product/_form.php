<?php

use app\components\MenuWidget;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
mihaildev\elfinder\Assets::noConflict($this);
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">
<?php if(Yii::$app->session->hasFlash('success') ): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <buuton type="button" class="close" data-dismiss="alert" aria-lable="Close"><span aria-hidden="true">&times;</span></buuton> 
    <?php echo Yii::$app->session->getFlash('success'); ?>
    </div>
<?php endif; ?> 
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    
    <div class="form-group field-product-category_id has-success">
        <label class="control-lable" for="product-category_id">Родительская категория</label>
        <select id="product-category_id" class="form-control" name="Product[category_id]">
        <?php echo MenuWidget::widget(['tpl'=>'select_product','model'=>$model]) ?>
        </select>
    </div>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php
    ?>
    <?php 
    echo $form->field($model, 'content')->widget(CKEditor::className(), [
 
  'editorOptions' => ElFinder::ckeditorOptions(['elfinder', 'path' => 'some/sub/path'],[/* Some CKEditor Options */]),
     ]);
    ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'old_price')->textInput() ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->fileInput() ?>
    <?= $form->field($model, 'gallery[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

    <?= $form->field($model, 'new')->checkbox([ '0'=>'Нет', '1'=>'Да', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'sale')->checkbox([ '0'=>'Нет', '1'=>'Да', ], ['prompt' => '']) ?>
     
    <?= $form->field($model, 'top')->checkbox([ '0'=>'Нет', '1'=>'Да', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'hits')->checkbox([ '0'=>'Нет', '1'=>'Да', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
