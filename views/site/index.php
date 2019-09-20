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

<!--<div class="container text-center">
    <a href="<? /*= Url::to(['dance-floor/index']); */ ?>"><? /*= Html::submitButton('Танцполы', ['class' => 'btn btn-default']); */ ?></a>
</div>-->

<br>

<ul class="list-group col-md-2">
    <h4>Список клубов</h4>
    <?php foreach ($clubs as $club): ?>
    <li class="list-group-item">
        <a href="<?= Url::to(['club/view', 'id' => $club->id]); ?>"><?= $club->name; ?></a>
        <?php endforeach; ?>
    </li>
</ul>
