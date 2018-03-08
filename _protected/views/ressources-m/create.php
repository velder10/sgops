<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RessourcesM */

$this->title = Yii::t('app', 'Create Ressources M');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ressources Ms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ressources-m-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
