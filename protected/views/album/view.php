<?php
/* @var $this AlbumController */
/* @var $model Album */

$this->breadcrumbs=array(
	'Albums'=>array('index'),
	$model->title,
);
?>

<h1>View Album #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'title',
        array(
            'name' => 'userId',
            'value' => $model->user->login,
            'visible' => Yii::app()->user->isAdmin(),
        ),
		array(
            'name' => 'type',
            'value' => $model->getTypeName(),
        ),
	),
)); ?>
