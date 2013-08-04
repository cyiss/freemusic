<?php

class ApiModule extends CWebModule
{
	public $uuid;
	public $digestKey;
	public $ipFilters=array();

	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'api.models.*',
			'api.components.*',
		));

		Yii::app()->setComponents(
			array(
				'user'=>array(
					'class'=>'CWebUser',
					'loginUrl'=>'/api/default/error',
				),
				'errorHandler'=>array(
					'errorAction'=>'/api/default/error',
				),
			)
		);

	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			$route=$this->id.'/'.$controller->id.'/'.$action->id;

			Yii::log('ip and route is ok', 'info');
			$publicPages=array(
				'api/user/register',
				'api/default/error',
			);
			
			Yii::log('check login?', 'info');
			Yii::log($route . $this->digestKey, 'info');

			// if request's digest is not right, throw a 401 http exception
			/*
			if( !$this->checkDigest($this->digestKey, $_GET) )
			{
				throw new CHttpException(401, "Unauthorized Access");
			}
			*/
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

	/*
	 * check digest of the request
	 */
	public function checkDigest($digestKey, $params)
	{
		// copy params into a new array
		$digest_array = $params;
		$request_digest_string="";
		/* digest must be set in url and digest can't be "" */
		if ( isset($digest_array['digest']) && $digest_array['digest'] !== "")
		{
			// digest_array holds elements used for digest
			// remove key digest for digest_array.
			$request_digest_string = $digest_array['digest']; 
			unset($digest_array['digest']);
		}
		else
		{
			return false;
		}
		// calculate digest
		$digest = new Digest($digestKey);
		$digest_string = $digest->hexdigest($digest_array);
		// compare calculated digest and the reqeust's digest
		if ( $digest_string === $request_digest_string )
		{
			return true;
		}

		return false;
	}

	/**
	 * Login user 
	 */
	protected function login()
	{
		$identity = new ApiUserIdentity($this->uuid);
		if ($identity->authenticate())
			Yii::app()->user->login($identity);
		else
		{
			Yii::app()->getModule('api')->user->loginRequired();
		}
	}
}
