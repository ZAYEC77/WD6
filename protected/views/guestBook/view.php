<?php
$this->breadcrumbs = array(
    'Guest Books' => array('index'),
    "by $model->fullname - " . date('d.m.Y', $model->date),
);

?>
<div class="btn-group">
    <?php echo CHtml::link('Back to list',array('admin'), array('class'=>'btn btn-inverse')); ?>
    <?php echo CHtml::link('Update',array('update','id'=>$model->id), array('class'=>'btn btn-inverse')); ?>
</div>
<h1>View response by <?php echo $model->fullname; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'fullname',
        'text',
        array(
            'label' => 'date',
            'value' => date("d.m.Y", $model->date),
        ),
    ),
)); ?>
