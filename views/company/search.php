<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Найденные группы';
?>

<title><?= Html::encode($this->title) ?></title>

<div class="nav nav-pills">
    <a href="<?= Url::to(['company/index']); ?>"> <?= Html::submitButton('Все группы', ['class' => 'btn btn-primary']); ?></a>
</div>

<h3 class="title text-center">Поиск по запросу: <?= Html::encode($search); ?></h3>

<?php if (!empty($companies)): ?>
    <?php foreach ($companies as $company): ?>

        <?php if ($company->name): ?>
            <div class="row">
                <a href="<?= Url::to(['company/view', 'id' => $company->id]); ?>">
                    <div class="col-lg-12 text-center"><h2><?= $company->name; ?></h2></div>
                </a>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
<?php else : ?>
    <h3 class="title text-center">Ничего не найдено...</h3>
<?php endif; ?>
