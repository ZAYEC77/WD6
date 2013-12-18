<?php
/**
 * Permission of standard CWebUser.
 *
 */
class WebUser extends CWebUser
{
    /**
     * @var null flowing values for result of model
     */
    private $model = null;

    public function getRole() {
        if($user = $this->getModel()){
            return $user->role;
        }
        return 0;
    }
    
    /**
     * Receiving username of the current user.
     *
     * @return array|mixed|null
     */
    public function getUsername()
    {
        if ($user = $this->getModel()) {
            return $user->username;
        }
    }

    public function isAdmin()
    {
        return $this->getRole() == User::ROLE_ADMIN;
    }

    /**
     * Data acquisition from base
     *
     * @return CActiveRecord|null
     */
    public function getModel()
    {
        if (!$this->isGuest && $this->model === null) {
            $this->model = User::model()->findByAttributes(array('login'=>$this->id));
        }
        return $this->model;
    }
}