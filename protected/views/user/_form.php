<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'login',array('size'=>30,'maxlength'=>30)); ?>

	<?php echo $form->passwordFieldRow($model,'password',array('size'=>30,'maxlength'=>30)); ?>

    <?php echo $form->dropDownListRow($model, 'role', User::getRoleList()); ?>

    <?php echo $form->dropDownListRow($model, 'status', User::getStatusList()); ?>

    <div class="clearfix"></div>

    <?php $this->widget(
        'bootstrap.widgets.TbButton',
        array('buttonType' => 'submit', 'type' => 'primary', 'label' => 'Login')
    ); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'reset', 'label' => 'Reset')); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->