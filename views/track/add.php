<?php

use app\models\Genre;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Трек';
?>

<title><?= Html::encode($this->title) ?></title>

<div class="nav nav-pills">
    <a href="<?= Url::to(['track/index']); ?>"> <?= Html::submitButton('Все треки', ['class' => 'btn btn-primary']); ?></a>
</div>

<div class="track container">
    <h3>Трек</h3>
    <div class="form-group">
        <div class="col-md-4">
            <?php $form = ActiveForm::begin(['id' => 'track-add-form']); ?>
            <?= $form->field($track, 'name')->textInput(['autofocus' => true, 'placeholder' => 'Введите название трека']); ?>
            <?= $form->field($track, 'genre_id')->dropDownList(Genre::getDropDown()); ?>
            <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary', 'name' => 'login-button']); ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>