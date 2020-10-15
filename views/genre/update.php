<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\models\Genre;

/** @var $genre Genre */

$this->title = 'Жанр';
?>

<title><?= Html::encode($this->title) ?></title>

<div class="nav nav-pills">
    <a href="<?= Url::to(['genre/index']) ?>">
        <?= Html::submitButton('Все жанры', ['class' => 'btn btn-primary']) ?>
    </a>
</div>

<div class="genre container">
    <h3>Жанр</h3>
    <div class="form-group">
        <div class="col-md-4">
            <?php $form = ActiveForm::begin(['id' => 'genre-update-form']); ?>
            <?= $form->field($genre, 'name')->textInput() ?>
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>