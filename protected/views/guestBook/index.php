<?php
/**
 * @var $this GuestBookController
 * @var $model GuestBook
 */
$this->breadcrumbs = array(
    'Guest Books',
);
?>

    <h1>Guest Books</h1>

<?php
$this->renderPartial('_view', array('model' => $model));
?>
<?php echo CHtml::ajaxButton('Next response', array('next'), array('success' => 'myFun'), array('class' => 'btn')); ?>
<?php $this->renderPartial('_addNew', array('model' => (new GuestBook()))); ?>
<script>
    var handler;
    function myFun(data)
    {
        clearInterval(handler);
        $('#response').fadeOut("slow", function(){
            var div = $(data).hide();
            $(this).replaceWith(div);
            $('#response').fadeIn("slow");
        });
        handler = setInterval(clickButton, 5000);
    }
    function clickButton() {
        $('#yt0').click();
    }

    $(function(){
        handler = setInterval(clickButton, 5000);
    });
</script>