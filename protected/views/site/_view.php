<?php
/**
 * @var $item Album
 * @var $showInfo Boolean
 */
?>
<div class="span-6 btn btn-inverse" style="margin-bottom: 30px; padding-bottom: 10px" >
    <?php if ($showInfo): ?>
        <h2 class="text-info"><?=$item->title;?></h2>
        <p>Author: <?= $item->user->login ?></p>
    <?php else: ?><?= CHtml::link('<h2 class="text-info">'.$item->title.'</h2>',array('/site/view','id'=>$item->id)); ?>

    <?php endif; ?>
    <div class="span-5" style="margin-left: 0">
        <div class="clearfix"></div>
        <?php foreach($item->files as $img): ?>
            <?= CHtml::image($img->getUrl(), "", array("class"=>"img-polaroid", "style"=>"width:200px")); ?>
        <?php endforeach; ?>
    </div>
</div>