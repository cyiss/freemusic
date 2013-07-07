<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->
	<?php if ( !Yii::app()->user->isGuest ) { // logged in ?>
	
	<div id="mainmenu">
	<?php
	$this->widget('zii.widgets.CMenu',array(
	  'activeCssClass'=>'active',
	  'activateParents'=>true,
	  'items'=>array(
	    array(
	      'label'=>'トップ',
	      'url'=>array('/ntadmin/default/index'),
	      'linkOptions'=>array('id'=>'menuTop'),
	      'itemOptions'=>array('id'=>'itemTop'),
	      'items'=>array(
	        array('label'=>'アプリ管理', 'url'=>array('/ntadmin/default/app')),
	      ),
	    ),
	    array(
	      'label'=>'キャンペーン',
	      'url'=>array('/ntadmin/campaign/'),
	      'linkOptions'=>array('id'=>'menuCampaign'),
	    	'itemOptions'=>array('id'=>'itemCampaign'),
	    	'items'=>array(
	    		array('label'=>'一覧', 'url'=>array('/ntadmin/campaign')),
	    	),
	    ),
	    array(
	      'label'=>'アイテム',
	      'url'=>array('/ntadmin/item/'),
	      'linkOptions'=>array('id'=>'menuItem'),
	      'itemOptions'=>array('id'=>'itemItem'),
	      'items'=>array(
	        array('label'=>'一覧', 'url'=>array('/ntadmin/item/index')),
	      ),
	    ),
	  	array(
	  			'label'=>'ユーザー',
	  			'url'=>array('/ntadmin/user/'),
	  			'linkOptions'=>array('id'=>'menuUser'),
	  			'itemOptions'=>array('id'=>'itemUser'),
	  			'items'=>array(
	  				array('label'=>'検索', 'url'=>array('/ntadmin/user/search')),
	  			),
	  	),
	    array(
	      'label'=>'サイト管理',
	      'url'=>array('/ntadmin/site'),
	      'linkOptions'=>array('id'=>'menuSite'),
	    	'itemOptions'=>array('id'=>'itemSite'),
	    	'items'=>array(
	    			array('label'=>'アプリ', 'url'=>array('/ntadmin/site/appSetting')),
	    			array('label'=>'お知らせ', 'url'=>array('/ntadmin/site/notice')),
	    			array('label'=>'ヘルプ', 'url'=>array('/ntadmin/site/help')),
	    			array('label'=>'利用規約', 'url'=>array('/ntadmin/site/terms')),
	    	),
	    ),
	  	array('label'=>'ログアウト ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
	  ),
	)); ?>
	</div>
	<?php } // end of logged in ?>	
	<!-- 
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
  
	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by NewsTech Inc.<br/>
		All Rights Reserved.<br/>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
