<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Найденные клубы';
?>

<title><?= Html::encode($this->title) ?></title>

<div class="nav nav-pills">
    <a href="<?= Url::to(['club/index']); ?>"> <?= Html::submitButton('Клуб', ['class' => 'btn btn-primary']); ?></a>
</div>

<h3 class="title text-center">Поиск по запросу: <?= Html::encode($search); ?></h3>

<?php if (!empty($clubs)): ?>
    <?php foreach ($clubs as $club): ?>

        <?php if ($club->name): ?>
            <div class="row">
                <a href="<?= Url::to(['club/view', 'id' => $club->id]); ?>">
                    <div class="col-lg-12 text-center"><h2><?= $club->name; ?></h2></div>
                </a>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
<?php else : ?>
    <h3 class="title text-center">Ничего не найдено...</h3>
<?php endif; ?>
