<?php
/* @var $this AlbumController */
/* @var $model Album */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'album-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldRow($model,'title',array('size'=>50,'maxlength'=>50)); ?>

    <?php if (Yii::app()->user->getRole() == User::ROLE_ADMIN) echo $form->dropDownListRow($model, 'userId', User::getAllUsers()); ?>

    <?php echo $form->dropDownListRow($model, 'type', Album::getTypeList()); ?>

    <div class="clearfix"></div>
    <?php $this->widget(
        'bootstrap.widgets.TbButton',
        array('buttonType' => 'submit', 'type' => 'primary', 'label' => $model->isNewRecord?'Create':'Save')
    ); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'reset', 'label' => 'Reset')); ?>


<?php $this->endWidget(); ?>

</div><!-- form -->