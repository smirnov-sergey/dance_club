<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Клуб';
?>

<title><?= Html::encode($this->title) ?></title>


<div class="nav nav-pills">
    <a href="<?= Url::to(['club/index']); ?>"> <?= Html::submitButton('Все клубы', ['class' => 'btn btn-primary']); ?></a>
</div>

<div class="container">
    <div class="row">
        <h3 class="text-center"><?= $club->name; ?></h3>
    </div>
</div>