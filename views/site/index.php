<?php

use app\models\Club;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Главная страница';
?>

<h3 class="text-center">Справочники</h3>

<div class="container text-center">
    <a href="<?= Url::to(['club/index']); ?>"><?= Html::submitButton('Клубы', ['class' => 'btn btn-default']); ?></a>
    <a href="<?= Url::to(['visitor/index']); ?>"><?= Html::submitButton('Посетители', ['class' => 'btn btn-default']); ?></a>
    <a href="<?= Url::to(['company/index']); ?>"><?= Html::submitButton('Группы', ['class' => 'btn btn-default']); ?></a>
    <a href="<?= Url::to(['playlist/index']); ?>"><?= Html::submitButton('Плейлисты', ['class' => 'btn btn-default']); ?></a>
    <a href="<?= Url::to(['track/index']); ?>"><?= Html::submitButton('Треки', ['class' => 'btn btn-default']); ?></a>
    <a href="<?= Url::to(['genre/index']); ?>"><?= Html::submitButton('Жанры музыки', ['class' => 'btn btn-default']); ?></a>
</div>

<br><br>

<div class="container text-center">
    <a href="<?= Url::to(['dance-floor/index']); ?>"><?= Html::submitButton('Танцполы', ['class' => 'btn btn-default']); ?></a>
</div>

<br><br><br>

<div class="row">
    <div class="col-md-2 col-md-offset-4">
        <?php $form = ActiveForm::begin(['id' => 'dance-index-form']); ?>
        <?= $form->field($danceFloor, 'id')->dropDownList(Club::getDropDown()); ?>
    </div>
    <div class="col-md-2 offset-top">
        <a href="<?= Url::to(['dance-floor/index', 'id' => $danceFloor->id]); ?>"><?= Html::submitButton('Посмотреть танцпол', ['class' => 'btn btn-info']); ?></a>
        <?php ActiveForm::end(); ?>
    </div>
</div>

