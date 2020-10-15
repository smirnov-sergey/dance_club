<?php
use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Company;

/** @var $company Company */

$this->title = 'Группа';
?>

<title><?= Html::encode($this->title) ?></title>

<div class="nav nav-pills">
    <a href="<?= Url::to(['company/index']) ?>">
        <?= Html::submitButton('Все группы', ['class' => 'btn btn-primary']) ?>
    </a>
</div>

<div class="table-responsive">
    <h3 class="text-center">Группа <?= $company->name ?></h3>

    <ul class="list-group col-md-2">
        <h4>Участники группы</h4>
        <?php foreach ($company->visitor as $visitor): ?>
        <li class="list-group-item">
            <?= $visitor->name ?> <br>
            <?php // @TODO: если группа пуста вывести сообщение ?>
            <?php endforeach; ?>
        </li>
    </ul>
</div>