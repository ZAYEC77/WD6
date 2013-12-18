<?php
/**
 * Created by PhpStorm.
 * User: dimka
 * Date: 12.12.13
 * Time: 10:33
 */

class RegisterForm extends CFormModel
{
    public $username;
    public $password;
    public $role;

    public function rules()
    {
        return array(
            array('username, password, role', 'required'),
            array('username', 'myValidation'),
        );
    }

    public function myValidation($attribute, $params)
    {
        if(!$this->hasErrors())
        {
            $model = User::model()->findAllByAttributes(array('login' => $this->username));
            if (count($model) != 0) {
                $this->addError('username','Username must be unique.');
            }
        }
    }

    public function register()
    {
        $model = new User();
        $model->login = $this->username;
        $model->password = $this->password;
        $model->status = User::STATUS_NEW;
        $model->role = $this->role;
        return $model->save(false);
    }
}