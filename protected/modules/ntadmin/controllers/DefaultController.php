<?php

class DefaultController extends Controller
{
	public $layout='/layouts/column1';
	
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function actionLogin()
	{
		// $model = Yii::createComponent('ntadmin.models.LoginForm');
		$model = new LoginForm;
		//collect user input data
		if (isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			
			// validate user input and redirect to the previous page if valid
			if( $model->validate() && $model->login() )
			{
				$this->redirect(Yii::app()->createUrl('ntadmin/default/index'));
			}
		}
		
		$this->render('login',array('model'=>$model));
	}
}