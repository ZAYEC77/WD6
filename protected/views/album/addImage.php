<?php
$this->breadcrumbs=array(
'Albums'=>array('/album/admin'),
'Add photo',
);

?>

<h1>Add photo</h1>
<div class="form">
<?php
 $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'addImage-form',
    'enableAjaxValidation'=>false,
    'stateful' => true,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<?php echo $form->errorSummary($model); ?>
    <?php echo $form->textFieldRow($model, 'title'); ?>

    <?php echo $form->fileFieldRow($model,'file'); ?>


    <div class="clearfix"></div>
    <?php $this->widget(
    'bootstrap.widgets.TbButton',
    array('buttonType' => 'submit', 'type' => 'primary', 'label' => $model->isNewRecord?'Create':'Save')
); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'reset', 'label' => 'Reset')); ?>


<?php $this->endWidget(); ?>