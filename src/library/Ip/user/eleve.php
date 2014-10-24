<?
class Hero_Rogue extends Hero {

	protected $helper = 'Helper_Hero';
	
	private $options = [
		'PV'  => 1500,
		'PM'  => 100,
		'int' => 25,
		'for' => 10,
		'agi' => 50
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

	public function setAgi($agi){
		$this->agi = $agi + $this->randCaract(10, 6);
	}

	function tirer (){

	}
}