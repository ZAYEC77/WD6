<?php
$this->breadcrumbs=array(
	'Guest Books'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List GuestBook','url'=>array('index')),
array('label'=>'Manage GuestBook','url'=>array('admin')),
);
?>

<h1>Create GuestBook</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>