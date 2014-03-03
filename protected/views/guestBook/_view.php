<?php
/**
 * @var $model GuestBook
 */
?>
<div class="view" id="response">
    <div>
        <span>
            <b><?php echo $model->fullname; ?></b>
        </span>
        <span class="pull-right"><?php echo date('D M Y h:m:s', $model->date); ?></span>
    </div>
    <div class="view" style="word-wrap: break-word;">
        <span>
            <?php echo $model->text; ?>
        </span>
    </div>
</div>