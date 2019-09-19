<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Группа';
?>

<title><?= Html::encode($this->title) ?></title>

<div class="nav nav-pills">
    <a href="<?= Url::to(['company/index']); ?>"> <?= Html::submitButton('Все группы', ['class' => 'btn btn-primary']); ?></a>
</div>

<table class="table">
    <thead class="thead-default">
    <tr>
        <th class="col-md-2"><h5>Название группы</h5></th>
        <th class="col-md-2"><h5>Участники группы</h5></th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><h3><?= $company->name; ?></h3></td>
        <td>
            <h3>
                <?php foreach ($company->visitor as $visitor): ?>
                    <?= $visitor->name; ?> <br>

                    <?php //TODO если група пуста вывести сообщение ?>
                    <?php /*if (!empty($visitor)) : */ ?><!--
                        <? /*= $visitor->name; */ ?> <br>
                    --><?php /*else: echo 'Группа пуста';
                    endif; */ ?>

                <?php endforeach; ?>
            </h3>
        </td>
    </tr>
    </tbody>
</table>