<?php

use app\models\Category;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Статья';
?>

<title><?= Html::encode($this->title) ?></title>

<div class="nav nav-pills">
    <a href="<?= Url::to(['article/index']); ?>"> <?= Html::submitButton('Все статьи', ['class' => 'btn btn-primary']); ?></a>
</div>

<div class="user-profile container">
    <h3>Статья</h3>
    <div class="form-group">
        <div class="col-md-4">
            <?php $form = ActiveForm::begin(['id' => 'article-add-form']); ?>
            <?= $form->field($article, 'title')->textInput(['autofocus' => true, 'placeholder' => 'Введите название']); ?>
            <?= $form->field($article, 'content')->textInput(['placeholder' => 'Введите контент']); ?>
            <?= $form->field($article, 'category_id')->dropDownList(Category::getDropDown()); ?>
            <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary', 'name' => 'login-button']); ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>