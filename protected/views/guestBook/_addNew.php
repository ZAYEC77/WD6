<?php
/**
 * @var $this GuestBookController
 * @var $model GuestBook
 * @var $form TbActiveForm
 * @author Dmytro Karpovych <ZAYEC77@gmail.com>
 */
?>
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'response-form',
    'htmlOptions' => array('class' => 'well', 'style' => 'margin-top:20px'),)
); ?>
    <h2>Add your response</h2>
<?php echo $form->textFieldRow($model, 'fullname'); ?>
<?php echo $form->textAreaRow($model, 'text'); ?>
    <hr>
<?php echo CHtml::ajaxSubmitButton('Sent', array('add'), array('replace' => '#response-form','beforeSend'=>'validate'), array('class' => 'btn','id'=>'yt1')); ?>
<?php $this->endWidget(); ?>
<script>
    function validate()
    {
        var flag = true;
        if($('#GuestBook_fullname').val()=='') {
            flag = false;
            $('#GuestBook_fullname').css('border-color','red');
        } else {
            $('#GuestBook_fullname').css('border-color','#cccccc');
        }
        if($('#GuestBook_text').val()=='') {
            flag = false;
            $('#GuestBook_text').css('border-color','red');
        } else {
            $('#GuestBook_text').css('border-color','#cccccc');
        }
        return flag;
    }
</script>