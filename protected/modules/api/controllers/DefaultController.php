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
		if ( Yii::app()->user->hasFlash('errorMsg') ) {
			$msg = Yii::app()->user->getFlash('errorMsg');
		}
		$this->data = array(
			"success" => 0,
			"content" => array(
				"error" => $msg,
			),
		);
	}
}