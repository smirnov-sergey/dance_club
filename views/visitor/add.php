<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Посетитель';
?>

<title><?= Html::encode($this->title) ?></title>

<div class="nav nav-pills">
    <a href="<?= Url::to(['visitor/index']); ?>"> <?= Html::submitButton('Все посетители', ['class' => 'btn btn-primary']); ?></a>
</div>

<div class="visitor container">
    <h3>Посетитель</h3>
    <div class="form-group">
        <div class="col-md-4">
            <?php $form = ActiveForm::begin(['id' => 'visitor-add-form']); ?>
            <?= $form->field($visitor, 'name')->textInput(['autofocus' => true, 'placeholder' => 'Введите имя']); ?>
            <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary', 'name' => 'login-button']); ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>