<?php
/**
	2021-10-30	v1.00	frank.a.hubert@gmail.com: Simple object to encapsulate all generic logging functions 
	2022-01-13	v1.01	removed not-logged-in user name and ::1 IP address when call no session info is available or call is from localhost  

**/
namespace App\tools;

class Logger
{
	function __construct()
	{}
	
	private static $debug=true;	// determines the logging level
	
	
	public static function setDebug(bool $debug)
	{	self::$debug=$debug;	}
	public static function isDebug()
	{	return self::$debug==true;	}
	
	public static function fine($msg)
	{
		if(self::isDebug())
		{	self::logMessage("FINE:    ".$msg);	}
	}

	public static function info($msg)
	{	self::logMessage("INFO:    ".$msg);	}

	public static function warning($msg)
	{	self::logMessage("WARNING: ".$msg);	}

	public static function error($msg)
	{	self::logMessage("ERROR:   ".$msg);	}

	private static function logMessage($msg)
	{
		$user=isset($_SESSION['user']) ? "user: ".$_SESSION['user'].", " : "";
		$host=($_SERVER['REMOTE_ADDR']!="::1") ? " from host ".$_SERVER['REMOTE_ADDR'] : "";
		error_log($msg." (".$user."page: ".basename($_SERVER['PHP_SELF']).$host.")");
	}

}

?>