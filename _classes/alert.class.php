<?php

class alert
{
	private function __construct(){}
	
	public static function red($msg)
	{
		return '<div class="alert red">' . $msg . '</div>';
	}
	
	public static function green($msg)
	{
		return '<div class="alert green">' . $msg . '</div>';
	}
	public static function yellow($msg)
	{
		return '<div class="alert yellow">' . $msg . '</div>';
	}

}