<?php

use yii\helpers\Html;
use yii\helpers\Url;

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

<div class="site-index">

    <div class="jumbotron">

        <h1></h1>
        <div class="body-content">
            <div class="row">
                <div class="col-lg-4">
                    <h2></h2>
                    <p></p>
                </div>

                <div class="col-lg-4">
                    <h2></h2>
                    <p></p>
                </div>

                <div class="col-lg-4">
                    <h2></h2>
                    <p></p>
                </div>
            </div>
        </div>
    </div>
</div>
