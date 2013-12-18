<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(	
	'theme' =>	'booster',
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Albums',
	'aliases' => array(
		'bootstrap' => 'ext.yiibooster',
		),
	// preloading 'log' component
	'preload'=>array(
		'booster',
		//'log',
		),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.extensions.yii-debug-toolbar.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'1',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
            'generatorPaths' => array(
            	'bootstrap.gii'
         	),
		),
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			'class' => 'WebUser',
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),

        'bootstrap' => array(
                'class' => 'ext.yiibooster.components.Bootstrap',
                'responsiveCss' => true,
                'coreCss' => false,
        ),
		//enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

		//MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=WD6',
			'username' => 'root',
			'password' => '1',
			'charset' => 'utf8',
		    'enableParamLogging'=>true,
		    'enableProfiling'=>true,
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
	        'class'=>'CLogRouter',
	        'routes'=>array(
	            array(
	                'class'=>'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
			    ),

		        array(
		            'class'=>'CProfileLogRoute',
		        ),
			),
		),	
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'ZAYEC77@gmail.com',
        'uploadPath'=>dirname(__FILE__).'/../../files/upload',
        'uploadUrl'=>'files/upload/',
	),
);