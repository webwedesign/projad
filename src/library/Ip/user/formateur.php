<?php

class Hero_Healer extends Hero {

	protected $helper = 'Helper_Hero';

	private $options = [
		'PV'  => 1000,
		'PM'  => 200,
		'int' => 50,
		'for' => 10,
		'agi' => 25
	];


	public function __construct($name){
		parent::__construct($this->options);
		$this->name = $name;
	}

	protected function setOptions(array $options){
		//Instruction, ajout dynamique possédant la méthode set<Name>();
		foreach ($options as $key => $value) {
			$method_name = 'set' . ucfirst($key);
			if (method_exists($this, $method_name)) {
				$this->$method_name($value);
			}
		}
	}

	public function setInt ($int) {
		$this->int = $int + $this->randCaract(10, 6);
	}

	public function soin (){

	}
}