<?php

use app\models\Genre;
use app\models\Company;
use app\models\Club;
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
            <?php $form = ActiveForm::begin(['id' => 'visitor-update-form']); ?>
            <?= $form->field($visitor, 'name')->textInput(); ?>
            <?= $form->field($visitor, 'gender')->radioList(['мужской' => 'М', 'женский' => 'Ж']) ?>
            <?= $form->field($visitor, 'genre')->dropDownList(Genre::getDropDown()); ?>
            <?= $form->field($visitor, 'company_id')->dropDownList(Company::getDropDown()); ?>
            <?= $form->field($visitor, 'club_id')->dropDownList(Club::getDropDown()); ?>
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'login-button']); ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>