<?php
/* @var $this FileController */
/* @var $model File */

$this->breadcrumbs=array(
	'Files'=>array('index'),
	'Manage',
);

?>
<h1>Manage Files</h1>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'file-grid',
    'dataProvider'=>$model->search(),
    'type'=>'striped bordered condensed',
    'template' => "{items}\n{pager}",
    'responsiveTable' => true,
	'columns'=>array(
		'id',
		'title',
		'url',
        array(
            'header'=>"Actions",
            'htmlOptions' => array('nowrap' => 'nowrap'),
            'class'=>'bootstrap.widgets.TbButtonColumn',
        ),
	),
)); ?>
