<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Найденные жанры';
?>

<title><?= Html::encode($this->title) ?></title>

<div class="nav nav-pills">
    <a href="<?= Url::to(['genre/index']); ?>"> <?= Html::submitButton('Все жанры', ['class' => 'btn btn-primary']); ?></a>
</div>

<h3 class="title text-center">Поиск по запросу: <?= Html::encode($search); ?></h3>

<?php if (!empty($genres)): ?>
    <?php foreach ($genres as $genre): ?>

        <?php if ($genre->name): ?>
            <div class="row">
                <a href="<?= Url::to(['genre/view', 'id' => $genre->id]); ?>">
                    <div class="col-lg-12 text-center"><h2><?= $genre->name; ?></h2></div>
                </a>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
<?php else : ?>
    <h3 class="title text-center">Ничего не найдено...</h3>
<?php endif; ?>
