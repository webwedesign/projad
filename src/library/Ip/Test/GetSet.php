<?php

class Test_GetSet {

	public $data = array();
	protected $name = "toto";


	public function __get($name){
		echo "Methode Magique __get pour $name";
		return $this->data[$name];
	}
	
	public function __set($name, $value){
		echo "Methode Magique __set pour $name";
		$this->data = $name;
	}
}