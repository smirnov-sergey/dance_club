<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Трек';
?>

<title><?= Html::encode($this->title) ?></title>

<div class="nav nav-pills">
    <a href="<?= Url::to(['track/index']); ?>"> <?= Html::submitButton('Все треки', ['class' => 'btn btn-primary']); ?></a>
</div>

<table class="table">
    <thead class="thead-default">
    <tr>
        <th class="col-md-2"><h5>Название трека</h5></th>
        <th class="col-md-2"><h5>Жанр музыки</h5></th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><h3><?= $track->name; ?></h3></td>
        <td><h3><?= $track->genre->name; ?></h3></td>
    </tr>
    </tbody>
</table>