<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	'Contact',
);
?>

<h1>Contact Us</h1>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

		<?php echo $form->textFieldRow($model,'name'); ?>

		<?php echo $form->textFieldRow($model,'email'); ?>

		<?php echo $form->textFieldRow($model,'subject',array('size'=>60,'maxlength'=>128)); ?>

		<?php echo $form->textAreaRow($model,'body',array('rows'=>6, 'cols'=>50)); ?>

		<div class="clearfix"></div>
	<?php if(CCaptcha::checkRequirements()): ?>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textFieldRow($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>	
	<?php $this->widget(
            'bootstrap.widgets.TbButton',
            array('buttonType' => 'submit', 'type' => 'primary', 'label' => 'Send')
        ); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'reset', 'label' => 'Reset')); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>