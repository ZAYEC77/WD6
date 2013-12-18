<?php

/**
 * This is the model class for table "albums".
 *
 * The followings are the available columns in table 'albums':
 * @property integer $id
 * @property string $title
 * @property integer $userId
 * @property integer $type
 */
class Album extends CActiveRecord
{
    const TYPE_PUBLIC = 1;
    const TYPE_PROTECTED = 2;
    const TYPE_PRIVATE = 3;

    public static function getTypeList()
    {
        return array(
            self::TYPE_PUBLIC => 'Public',
            self::TYPE_PROTECTED=> 'Protected',
            self::TYPE_PRIVATE => 'Private',
        );
    }

    public function getTypeName()
    {
        $list = self::getTypeList();
        return $list[$this->type];
    }

    public static function getPublicAlbums()
    {
        $albums = array();
        $users = User::model()->findAll();
        $type = Yii::app()->user->getRole()+1;
        $userId = (Yii::app()->user->getModel() != null)?Yii::app()->user->getModel()->id:0;

        foreach($users as $user) {
            foreach($user->albums as $album) {
                if ($user->id == $userId) {
                    $albums []= $album;
                    continue;
                }
                if ($album->type <= $type ) {
                    $albums []= $album;
                }
            }
        }
        return $albums;
    }

    public function getAlbumsForUsers()
    {
        $criteria=new CDbCriteria;
        if (!Yii::app()->user->isAdmin()) {
            $criteria->compare('userId', Yii::app()->user->getModel()->id);
        }
        $model = self::model()->findAll($criteria);
        return $model;
    }
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'albums';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, userId, type', 'required'),
			array('userId, type', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, userId, type', 'safe', 'on'=>'search'),
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
            'user'=>array(self::BELONGS_TO, 'User', 'userId'),
            'files'=>array(self::HAS_MANY, 'File', 'albumId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'userId' => 'User',
			'type' => 'Type',
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


        if (!Yii::app()->user->isAdmin()) {
            $criteria->compare('userId', Yii::app()->user->getModel()->id);
        }

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Album the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
