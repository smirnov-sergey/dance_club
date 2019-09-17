<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Главная страница';
?>


    <div class="container">
        <a href="<?= Url::to(['club/index']); ?>"><?= Html::submitButton('Справочник клубов', ['class' => 'btn btn-default']); ?></a>
        <a href="<?= Url::to(['visitor/index']); ?>"><?= Html::submitButton('Справочник посетителей', ['class' => 'btn btn-default']); ?></a>
        <a href="<?= Url::to(['playlist/index']); ?>"><?= Html::submitButton('Справочник плейлистов', ['class' => 'btn btn-default']); ?></a>
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
