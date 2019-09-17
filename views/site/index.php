<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Главная страница';
?>


<nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
        <a href="<?= Url::to(['abonent/index']); ?>"><?= Html::submitButton('Справочник организаций', ['class' => 'btn btn-default']); ?></a>
    </div>
</nav>

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
