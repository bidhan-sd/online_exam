<?php
class Session{
	public static function init(){
		session_start();
	}

	public static function set($key, $val){
		$_SESSION[$key] = $val;
	}

	public static function get($key){
		if (isset($_SESSION[$key])) {
			return $_SESSION[$key];
		} else {
			return false;
		}
	}

	/*
		This function only use for admin panel logIn issue.
		If Not loged in But hit into admin panel page therefore return into login.php page.
	*/
	public static function checkAdminSession(){
		self::init();
		if (self::get("adminLogin") == false) {
			self::destroy();
			header("Location:login.php");
		}
	}
	/*
		This function only use for admin panel logIn issue.
		If loged in But hit into login.php page therefore return into index.php page.
	*/
	public static function checkAdminLogin(){
		self::init();
		if (self::get("adminLogin") == true) {
			header("Location:index.php");
		}
	}

	public static function checkSession(){
		if (self::get("login") == false) {
			self::destroy();
			header("Location:index.php");
		}
	}

	public static function checkLogin(){
		if (self::get("login") == true) {
			header("Location:exam.php");
		}
	}

	public static function destroy(){
		session_destroy();
		session_unset();
	}
}

?>