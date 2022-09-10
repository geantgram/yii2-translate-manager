<?php
/**
 * @author Rio Hazuki <hazuki_scorpion@yahoo.fr>
 *
 * @since 1.3
 */

/* @var $this yii\web\View */
/* @var $model geantgram\translatemanager\models\Language */

$this->title = Yii::t('language', 'Create {modelClass}', [
    'modelClass' => 'Language',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('language', 'Languages'), 'url' => ['list']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="language-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>