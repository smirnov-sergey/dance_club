<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Плейлист';
?>

<title><?= Html::encode($this->title) ?></title>


<div class="nav nav-pills">
    <a href="<?= Url::to(['playlist/index']); ?>"> <?= Html::submitButton('Все плейлисты', ['class' => 'btn btn-primary']); ?></a>
</div>

<div class="container">
    <div class="row">
        <h3 class="text-center"><?= $playlist->name; ?></h3>
    </div>
</div>