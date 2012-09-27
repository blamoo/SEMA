<?php
class token
{
	private function __construct(){}

	static public function generate($realm = 'default')
	{
		if (!session_id())
			session_start();
		
		$_SESSION['security_token'][$realm] = md5(uniqid());
		
		return $_SESSION['security_token'][$realm];
	}

	static public function verify($str, $realm = 'default')
	{
		if (!session_id())
			session_start();
		
		if (!isset($_SESSION['security_token'][$realm]))
			return false;
		
		$tmp = $_SESSION['security_token'][$realm];
		unset($_SESSION['security_token'][$realm]);
		
		return $tmp == $str;
	}
}