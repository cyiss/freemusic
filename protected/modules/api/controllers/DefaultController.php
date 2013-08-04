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
		$code = 200;

		if($error=Yii::app()->errorHandler->error)
		{
			$msg = $error{'message'};
			$code = $error{'code'};
		}
		$this->data = array(
			"success" => 0,
			"content" => array(
				"code" => $code,
				"error" => $msg,
			),
		);
	}
}