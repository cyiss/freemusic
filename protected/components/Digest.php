<?php

/**
 * Digest calculates hash of the url's parameters
 *
 *
 */
class Digest
{
	/*
	 * key
	 */
	public $key;

	public function __construct($key)
	{
		Yii::log("set key: $key", 'info');
		$this->key = $key;
	}

	public function hexdigest($params)
	{
		$params['key'] = $this->key;
		ksort($params);

		foreach ($params as $key => $value) {
			Yii::log("digest key: " . $key . " value: " . $value, "info");
		}

		$join_string = implode(";", array_values($params));
		
		Yii::log("join: $join_string", "info");

		$digest_string = md5($join_string);

		Yii::log("digest: $digest_string", "info");

		return $digest_string;
	}
}