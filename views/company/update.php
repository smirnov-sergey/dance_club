<?php

use app\models\Genre;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Группа';
?>

<title><?= Html::encode($this->title) ?></title>

<div class="nav nav-pills">
    <a href="<?= Url::to(['company/index']); ?>"> <?= Html::submitButton('Все группы', ['class' => 'btn btn-primary']); ?></a>
</div>

<div class="company container">
    <h3>Группа</h3>
    <div class="form-group">
        <div class="col-md-4">
            <?php $form = ActiveForm::begin(['id' => 'company-update-form']); ?>
            <?= $form->field($company, 'name')->textInput(); ?>
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'login-button']); ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>