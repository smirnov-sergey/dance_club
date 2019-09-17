<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Посетитель';
?>

<title><?= Html::encode($this->title) ?></title>


<div class="nav nav-pills">
    <a href="<?= Url::to(['visitor/index']); ?>"> <?= Html::submitButton('Все посетители', ['class' => 'btn btn-primary']); ?></a>
</div>

<div class="container">
    <div class="row">
        <h3 class="text-center"><?= $visitor->name; ?></h3>
        <h3 class="text-center"><?= $visitor->gender; ?></h3>
        <h3 class="text-center"><?= $visitor->company->name; ?></h3>
        <h3 class="text-center"><?= $visitor->club->name; ?></h3>
    </div>
</div>