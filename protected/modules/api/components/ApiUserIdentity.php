<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class ApiUserIdentity extends CUserIdentity
{
	public $uuid;

	public function __construct($uuid)
	{
		$this->uuid = $uuid;
	}

	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$user = User::model()->find(
			'uuid=:uuid',
			array(
				':uuid' => $this->uuid,
			)
		);

		if (is_null($user)) {
			Yii::log('user does not exist','info');
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		} else {
			Yii::log('exists','info');
			$this->errorCode=self::ERROR_NONE;
		}

		return !$this->errorCode;
	}
}