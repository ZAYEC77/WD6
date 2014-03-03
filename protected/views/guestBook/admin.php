<?php
$this->breadcrumbs = array(
    'Guest Books' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List GuestBook', 'url' => array('index')),
    array('label' => 'Create GuestBook', 'url' => array('create')),
);
?>

<h1>Manage Guest Books</h1>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'guest-book-grid',
    'dataProvider' => $model->search(),
    'columns' => array(
        'fullname',
        array(
            'name'=>'visible',
            'value'=>'$data->visible?"Yes":"No"',
        ),
        array(
            'name'=>'date',
            'value'=>'date("d.m.Y", $data->date)',
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
)); ?>
