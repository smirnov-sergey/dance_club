<?php

use yii\helpers\Html;
use yii\helpers\Url;
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

<table class="table">
    <thead class="thead-default">
    <tr>
        <th class="col-md-2"><h5>Название жанра музыки</h5></th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><h3><?= $genre->name ?></h3></td>
    </tr>
    </tbody>
</table>