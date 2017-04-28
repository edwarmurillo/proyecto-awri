<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title='Cargar logo';
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $msg 

?>



<?php $form = ActiveForm::begin([
     "method" => "post",
     "enableClientValidation" => true,
     "options" => ["enctype" => "multipart/form-data"],
     ]);
?>

<?= $form->field($model, "file[]")->fileInput(['multiple' => true]) ?>

<?= Html::submitButton("Subir", ["class" => "btn btn-primary"]) ?>


<?php echo Html::img('@web/archivos/LOGO HM.jpg') ?>
<?php $form->end() ?>