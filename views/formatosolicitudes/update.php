<?php

use yii\helpers\Html;
use app\models\Roles;

/* @var $this yii\web\View */
/* @var $model app\models\Formatosolicitudes */
?>
<div class="formatosolicitudes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php

      echo $this->render('_formEditar', ['model' => $model,]);



?>
</div>
