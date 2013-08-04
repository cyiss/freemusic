<?php

class UserController extends APIController
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionLogin()
	{
		$this->data = array (
			'success' => 1,
			'content' => array(
				'message' => 'in user/action/login',
			),
		);
	}

	public function actionRegister()
	{
		$model = new User;

		if (isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];

			if ($model->save())
			{
				
			}
		}
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}