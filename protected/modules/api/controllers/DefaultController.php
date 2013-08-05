<?php

class DefaultController extends APIController
{
	public function actionIndex()
	{
		$this->data = array(
			"success" => 1,
			"content" => array(
			),
		);
	}

	public function actionError($msg = 'default error message')
	{
		$browser = Yii::app()->browser->getBrowser();
		$platform = Yii::app()->browser->getPlatform();
		$userAgent = Yii::app()->browser->getUserAgent();
		$ismobile = Yii::app()->browser->isMobile();
		$code = 200;


		$errors = array();
		if (Yii::app()->getModule('api')->user->hasState('errors')) {
			$errors = Yii::app()->getModule('api')->user->getState('errors');
		}

		$post = array();
		if (Yii::app()->getModule('api')->user->hasState('post')) {
			$post = Yii::app()->getModule('api')->user->getState('post');
		}

		if($error=Yii::app()->errorHandler->error)
		{
			$msg = $error{'message'};
			$code = $error{'code'};
		}
		$this->data = array(
			"success" => 0,
			"content" => array(
				"code" => $code,
				"error" => $browser . " " . $platform . " " .$msg,
				"useragent" => $userAgent,
				"ismobile" => $ismobile,
			),
			'errors' => $errors,
			'post' => $post,
		);
	}
}