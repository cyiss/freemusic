<?php

class UserController extends APIController
{
	public function actionIndex()
	{
		Yii::log("api/user/index", 'info');
		if (isset($_GET['id']) && 
			isset($_GET['id']) == Yii::app()->getModule('api')->user->id)
		{
			$user_id = $_GET['id'];
			$model = User::model()->findByPk($user_id);
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
					throw new CHttpException('203', 'user exists');
				}
			}
			/*
			 * Insert a new user
			 */
			$model->attributes=$_POST['User'];

			if ($model->validate())
			{
				$model->save();
				$this->redirect(array('/api/user/index', 'id'=>$model->id, 'uuid'=>$model->uuid));
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