<?php
/**
 *
 */
$this->pageTitle=Yii::app()->name . ' - Register';
$this->breadcrumbs=array(
    'Register',
);
?>



<h1>Register</h1>

<p>Please fill out the following form with your login credentials:</p>

<div class="form">
    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'register-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
    )); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->textFieldRow($model,'username'); ?>

    <?php echo $form->textFieldRow($model,'password'); ?>

    <?php echo $form->dropDownListRow($model,'role', User::getRoleList()); ?>

    <div class="clearfix"></div>
    <?php $this->widget(
        'bootstrap.widgets.TbButton',
        array('buttonType' => 'submit', 'type' => 'primary', 'label' => 'Register')
    ); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'reset', 'label' => 'Reset')); ?>

    <?php $this->endWidget(); ?>
</div><!-- form -->
