<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Посетитель';
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
    <a href="<?= Url::to(['visitor/index']); ?>"> <?= Html::submitButton('Все посетители', ['class' => 'btn btn-primary']); ?></a>
</div>

<div class="visitor container">
    <h3>Плейлист</h3>
    <div class="form-group">
        <div class="col-md-4">
            <?php $form = ActiveForm::begin(['id' => 'visitor-update-form']); ?>
            <?= $form->field($visitor, 'name')->textInput(); ?>
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'login-button']); ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>