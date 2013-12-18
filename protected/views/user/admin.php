<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

?>

<h1>Manage Users</h1>


<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),	
    'type'=>'striped bordered condensed',
    'template' => "{items}\n{pager}",
    'responsiveTable' => true,
	'columns'=>array(
		'id',
		'login',
        array('name' => 'Role', 'value' => '$data->getRole()'),
		'status',
		array(
            'header'=>"Actions",
            'htmlOptions' => array('nowrap' => 'nowrap'),
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
