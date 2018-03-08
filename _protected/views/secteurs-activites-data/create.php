<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SecteursActivitesData */

$this->title = Yii::t('app', 'Create Secteurs Activites Data');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Secteurs Activites Datas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="secteurs-activites-data-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
