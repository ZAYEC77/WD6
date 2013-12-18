<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $login
 * @property string $password
 * @property integer $role
 * @property integer $status
 */
class User extends CActiveRecord
{
    const ROLE_ADMIN = 2;
    const ROLE_USER = 1;
    const ROLE_GUEST = 0;

    const STATUS_NEW = 1;
    const STATUS_NORMAL = 2;
    const STATUS_LOCKED = 3;

    public static function getStatusList()
    {
        return array(
            self::STATUS_NEW => "New",
            self::STATUS_NORMAL => "Active",
            self::STATUS_LOCKED => "Locked",
        );
    }
    public static function getMenu()
    {
        $item = array('label'=>'Albums','url'=>'#','items'=>array());
        $users = User::model()->findAll();
        $type = Yii::app()->user->getRole()+1;
        $userId = (Yii::app()->user->getModel() != null)?Yii::app()->user->getModel()->id:0;

        foreach($users as $user) {
            $list = array();
            foreach($user->albums as $album) {
                if ($user->id == $userId) {
                    $list []= array('label'=>$album->title,'url'=>array('/site/view','id'=>$album->id));
                    continue;
                }
                if ($album->type <= $type ) {
                    $list []= array('label'=>$album->title,'url'=>array('/site/view','id'=>$album->id));
                }
            }
            $item['items'] []= array('label'=>$user->login,'url'=>'#','items'=>$list);
        }
        return $item;
    }

    public static function getRoleList()
    {
        return array(
            self::ROLE_USER => "User",
            self::ROLE_ADMIN => "Admin",
        );
    }

    public static function getAllUsers()
    {
        $list= Yii::app()->db->createCommand('SELECT id, login FROM users')->queryAll();
        $rs=array();
        foreach($list as $item){
            $rs[$item['id']]=$item['login'];
        }
        return $rs;
    }

    public function getRole()
    {
        $list = self::getRoleList();
        return $list[$this->role];
    }
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('login, password, role, status', 'required'),
			array('role, status', 'numerical', 'integerOnly'=>true),
			array('login, password', 'length', 'max'=>30),
			array('id, login, password, role, status', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
            'albums' => array(self::HAS_MANY, 'Album', 'userId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'login' => 'Login',
			'password' => 'Password',
			'role' => 'Role',
			'status' => 'Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('login',$this->login,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('role',$this->role);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
