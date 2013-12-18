<?php
/* @var $this AlbumController */
/* @var $model Album */

$this->breadcrumbs=array(
	'Albums'=>array('/album/admin'),
	'Create',
);

?>

<h1>Create Album</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>