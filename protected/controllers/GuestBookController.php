<?php

class GuestBookController extends Controller
{
    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('index','view','add','next'),
                'users'=>array('*'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('admin','delete','update','create','test'),
                'users'=>User::getAllUsers(),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }


    /**
     * @param $id
     * @return mixed
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = GuestBook::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new GuestBook;

        $this->performAjaxValidation($model);

        if (isset($_POST['GuestBook'])) {
            $model->attributes = $_POST['GuestBook'];
            if ($model->save())
                $this->redirect(array('admin'));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        $this->performAjaxValidation($model);

        if (isset($_POST['GuestBook'])) {
            $model->attributes = $_POST['GuestBook'];
            if ($model->save())
                $this->redirect(array('admin'));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }


    /**
     * @param $id
     * @throws CHttpException
     */
    public function actionDelete($id)
    {
        if (Yii::app()->request->isPostRequest) {

            $this->loadModel($id)->delete();

            if (!isset($_GET['ajax']))
                $this->redirect(array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $model = GuestBook::model()->findAllByAttributes(array('visible'=>1));
        $i = rand(0,count($model)-1);
        $model = $model[$i];
        $this->render('index', array(
            'model' => $model,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new GuestBook('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['GuestBook']))
            $model->attributes = $_GET['GuestBook'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'guest-book-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionNext()
    {
        $model = GuestBook::model()->findAllByAttributes(array('visible'=>1));
        $i = rand(0,count($model)-1);
        $model = $model[$i];
        $this->renderPartial('_view', array(
            'model' => $model,
        ));
    }

    public function actionAdd()
    {
        $model = new GuestBook();
        if (isset($_POST['GuestBook'])) {
            $model->attributes = $_POST['GuestBook'];
            $model->visible = 0;
            if ($model->save()) {
                $this->renderPartial('_success');
            } else {
                $this->renderPartial('_addNew',array('model'=>$model));
            }
        }
    }

    protected function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    public function actionTest()
    {
        for($i = 0; $i <2; $i++) {
            $model = new GuestBook();
            $model->visible = 1;
            $model->fullname = $this->generateRandomString(8);
            $model->text = $this->generateRandomString(200);
            $model->save(false);
        }
    }
}
