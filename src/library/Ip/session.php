<?php

class Session {

	protected static $instance;

	protected function __construct() {
		$this->start();
	}
	
	protected function __clone() { }

	public static function getInstance()
	{
	   if (!isset(self::$instance))
	   {
	      self::$instance = new self; 
	}

	return self::$instance;
	}

	/**
	 * Gestion de la Session
	 */
	public function start(){
		
		if($this->getStatus() !== PHP_SESSION_ACTIVE)
			session_start();

	}

	public function getStatus(){
		return session_status();
	}

	public function destroy(){
		session_destroy();
	}

	/**
	 * Gestion avec les méthodes magiques des éléments contenus dans la Session
	 */
	public function __isset($namespace){
		return isset($_SESSION[$namespace]);
	}

	public function __unset($namespace){
		unset($_SESSION[$namespace]);
	}

	public function __get($namespace){
		return $_SESSION[$namespace];
	}

	public function __set($namespace, $value){
		$_SESSION[$namespace] = $value;
	}
}