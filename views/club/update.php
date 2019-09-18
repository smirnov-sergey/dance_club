<?php

use app\models\Playlist;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Клуб';
?>

<title><?= Html::encode($this->title) ?></title>

<?php if (Yii::$app->session->hasFlash('warning')): ?>
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <?php echo Yii::$app->session->getFlash('warning') ?>
    </div>
<?php endif; ?>

<div class="nav nav-pills">
    <a href="<?= Url::to(['club/index']); ?>"> <?= Html::submitButton('Все клубы', ['class' => 'btn btn-primary']); ?></a>
</div>

<div class="club container">
    <h3>Клуб</h3>
    <div class="form-group">
        <div class="col-md-4">
            <?php $form = ActiveForm::begin(['id' => 'club-update-form']); ?>
            <?= $form->field($club, 'name')->textInput(); ?>
            <?= $form->field($club, 'playlist_id')->dropDownList(Playlist::getDropDown()); ?>
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'login-button']); ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
