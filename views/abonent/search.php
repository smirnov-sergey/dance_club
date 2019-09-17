<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Найденные статьи';
?>

<title><?= Html::encode($this->title) ?></title>

<div class="nav nav-pills">
    <a href="<?= Url::to(['abonent/index']); ?>"> <?= Html::submitButton('Справочник', ['class' => 'btn btn-primary']); ?></a>
</div>


<h3 class="title text-center">Поиск по запросу: <?= Html::encode($search); ?></h3>

<?php if (!empty($abonents)): ?>
    <?php foreach ($abonents as $abonent): ?>

        <?php if ($abonent->organization_id): ?>
            <div class="row">
                <a href="<?= Url::to(['abonent/view', 'id' => $abonent->organization_id]); ?>">
                    <div class="col-lg-12 text-center"><h2><?= $abonent->organization->name; ?></h2></div>
                </a>
            </div>

        <?php elseif ($abonent->individual_id) : ?>
            <div class="row">
                <a href="<?= Url::to(['abonent/view', 'id' => $abonent->individual]); ?>">
                    <div class="col-lg-12 text-center"><h2><?= $abonent->individual->name; ?></h2></div>
                </a>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
<?php else : ?>
    <h3 class="title text-center">Ничего не найдено...</h3>
<?php endif; ?>
