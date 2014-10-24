<?php

class Hero_Tank extends Hero {

	protected $helper = 'Helper_Hero';

	private $options = [
		'PV'  => 2000,
		'PM'  => 100,
		'int' => 10,
		'for' => 50,
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

	public function setFor($for){
		$this->for = $for + $this->randCaract(10, 6);
	}

	function frapper (Hero $hero){
		$hero->PV = $hero->PV - 100;

		return $this;
	}

	function bloquer (){

	}
}