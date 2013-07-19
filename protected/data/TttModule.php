<?php

class TttModule extends CWebModule
{
	public $username;
	public $password;
	public $uuid;
	public $ipFilters=array();
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'ttt.models.*',
			'ttt.components.*',
		));
		/*
		$this->setComponents(array(
            'errorHandler' => array(
                'errorAction' => 'ttt/default/error'),
            'user' => array(
                'class' => 'CWebUser',             
                'loginUrl' => Yii::app()->createUrl('ttt/default/login'),
            )
        ));
 
		Yii::app()->user->setStateKeyPrefix('_ttt');
		*/
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			$route=$this->id.'/'.$controller->id.'/'.$action->id;
			if(!$this->allowIp(Yii::app()->request->userHostAddress) && $route!=='default/error')
				throw new CHttpException(403,"You are not allowed to access this page.");
			Yii::log('ip and route is ok', 'info');
			$publicPages=array(
				'ttt/default/json',
				'ttt/default/error',
			);
			Yii::log('check login?', 'info');
			Yii::log($route, 'info');
			// if($this->password!==false && Yii::app()->user->isGuest && !in_array($route,$publicPages))
			if($this->uuid!==false && Yii::app()->user->isGuest && !in_array($route,$publicPages) )
			{
				$this->login(); // Yii::app()->user->loginRequired();
				Yii::log('guest login ok', 'info');
			}
			else
			{
				Yii::log('guest don\'t have uuid', 'info');
				return true;
			}
		}
		else
			return false;
	}
	
	/**
	 * Checks to see if the user IP is allowed by {@link ipFilters}.
	 * @param string $ip the user IP
	 * @return boolean whether the user IP is allowed by {@link ipFilters}.
	 */
	protected function allowIp($ip)
	{
		if(empty($this->ipFilters))
			return true;
		foreach($this->ipFilters as $filter)
		{
			if($filter==='*' || $filter===$ip || (($pos=strpos($filter,'*'))!==false && !strncmp($ip,$filter,$pos)))
				return true;
		}
		return false;
	}

	/**
	 * Login user 
	 *
	 *
	 */
	protected function login()
	{
		$identity = new TUserIdentity($this->uuid);
		if ($identity->authenticate())
			Yii::app()->user->login($identity);
		else
			Yii::app()->getModule('ttt')->user->loginRequired();
	}
}
