<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<?php if(Yii::app()->user->hasFlash('registration')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('registration'); ?>
    </div>

<?php endif; ?>
<h1>Welcome to <?php echo CHtml::encode(Yii::app()->name); ?></h1>


<div class="span12">
<h3>Free photo album service for all people</h3>
    <?php
        foreach ($model as $item) {
            $this->renderPartial('_view',array('item'=>$item,'showInfo'=>false));
        }
    ?>
</div>

