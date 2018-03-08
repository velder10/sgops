<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RessourcesH */

$this->title = Yii::t('app', 'Create Ressources H');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ressources Hs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ressources-h-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
