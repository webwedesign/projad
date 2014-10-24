<?php

class Test_Visible {

	public $public = "Je suis public";
	protected $protected = "Je suis protected";
	private $private = "Je suis private";

	public function fPublic(){
		var_dump("---- fPublic ----");
		var_dump($this->public);
		var_dump($this->protected);
		var_dump($this->private);
		var_dump("Appel dans fPublic");
		$this->fProtected();
		$this->fPrivate();
	}

	protected function fProtected(){
		var_dump("---- fProtected ----");
		var_dump($this->public);
		var_dump($this->protected);
		var_dump($this->private);
	}

	private function fPrivate(){
		var_dump("---- fPrivate ----");
		var_dump($this->public);
		var_dump($this->protected);
		var_dump($this->private);
	}

}