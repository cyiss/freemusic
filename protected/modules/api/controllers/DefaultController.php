<?php

class DefaultController extends APIController
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionError()
	{
		$this->data = array(
			"success" => 0,
			"contents" => array(
				"error" => "Default Error Message",
			),
		);
	}
}