<?php
/* @var $this AlbumController */
/* @var $model Album */

$this->breadcrumbs=array(
	'Albums'=>array('/album/admin'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

?>

<h1>Update Album <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>