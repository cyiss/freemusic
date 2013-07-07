<?php

class NtadminModule extends CWebModule
{
	public $ipFilters;
	
	public $password;
	
	public $username;
	
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		parent::init();
		
		// import the module-level models and components
		$this->setImport(array(
			'ntadmin.models.*',
			'ntadmin.components.*',
		));
		
		Yii::app()->setComponents(array(
				'user' => array(
						'class' => 'CWebUser',
						'stateKeyPrefix' => 'ntadmin',
						'loginUrl' => Yii::app()->createUrl($this->getId().'/default/login'),
				),
		), false);
		
	}

	/**
	 * Performs access check to ntadmin.
	 * This method will check to see if user IP and password are correct if they attempt
	 * to access actions other than "default/login" and "default/error".
	 * @param CController $controller the controller to be accessed.
	 * @param CAction $action the action to be accessed.
	 * @return boolean whether the action should be executed.
	 */
	
	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			Yii::log($controller->id, 'info');
			// Yii::log($action->id, 'info');
			$route=$controller->id.'/'.$action->id;
			if(!$this->allowIp(Yii::app()->request->userHostAddress) && $route!=='default/error')
				throw new CHttpException(403,"You are not allowed to access this page.");
			
			$publicPages=array(
					'default/login',
					'default/error',
			);
			if($this->password!==false && Yii::app()->user->isGuest && !in_array($route,$publicPages))
				Yii::app()->user->loginRequired();
			else
				return true;
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
}
