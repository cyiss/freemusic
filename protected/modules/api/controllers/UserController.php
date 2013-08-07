<?php

class UserController extends APIController
{
	public function actionIndex()
	{
		Yii::log("api/user/index", 'info');
		if ( isset($_GET['uuid']) )
		{
			$uuid = $_GET['uuid'];
			$model = User::model()->findByUuid($uuid);
			$this->data = $model;
		}
		else
		{
			throw new CHttpException("203", "Current user information is not available");
		}
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
			/*
			 * Check if uuid exists.
			 */
			if (isset($_POST['User']) && isset($_POST['User']['uuid']))
			{
				$user_uuid = $_POST['User']['uuid'];
				$user = User::model()->findByUuid($user_uuid);
				if ($user) {
					$this->forward('index');
					return;
				}
			}
			/*
			 * Insert a new user
			 */
			$model->attributes=$_POST['User'];

			if ($model->validate())
			{
				$model->save();
				$this->forward('index');
				return;
			}
			else
			{
				$errors = $model->getErrors();
				Yii::app()->getModule('api')->user->setState('errors', $errors);
				Yii::app()->getModule('api')->user->setState('post', $_POST);
				throw new CHttpException('403', 'user validation failed');
			}
		}
		else
		{
			throw new CHttpException('203', 'user data is not sufficient');
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