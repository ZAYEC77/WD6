<?php
/* @var $this AlbumController */
/* @var $model Album */

$this->breadcrumbs=array(
	'Albums'=>array('/album/admin'),
	'Manage',
);

?>

<h1>Manage Albums</h1>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'album-grid',
	'dataProvider'=>$model->search(),
    'type'=>'striped bordered condensed',
    'template' => "{items}\n{pager}",
    'responsiveTable' => true,
	'columns'=>array(
		'id',
		'title',
        array(
            'name' => 'userId',
            'value' => '$data->user->login',
            'visible' => Yii::app()->user->isAdmin(),
        ),
        array(
            'name' => 'type',
            'value' => '$data->getTypeName()',
        ),
		array(
            'template' => '{update}{delete}{add}',
            'header'=>"Actions",
            'htmlOptions' => array('nowrap' => 'nowrap'),
            'class'=>'bootstrap.widgets.TbButtonColumn',
           // 'addButtonUrl' => 'Yii::app()->controller->createUrl("site",array("id"=>$data->id))',
		),
	),
)); ?>
