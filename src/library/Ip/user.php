<?php

abstract class User {
	
	protected $helper;

	protected $name;
	
	protected $PV;
	protected $PM;

	protected $int;
	protected $agi;
	protected $for;

	protected $xp = 0;
	protected $sexe;

	public static $compteur = 0;

	public function __construct (array $options){
		self::$compteur++;
		$this->setOptions($options);
		$this->setSexe(rand(0,1));
	}

	abstract protected function setOptions(array $options);

	public function getCompteur(){
		return self::$compteur;
	}

	public function frapper (Hero $hero){
		$hero->PV = $hero->PV - 10;
		return $this;
	}

	public function randCaract($value, $multiplicateur){
		$resultat = 0;

		if(is_int($value) && is_int($multiplicateur)){
			$valueRand = rand(1, $value);
			$multRand = rand(1, $multiplicateur);
			$resultat = $valueRand * $multRand;
		}

		return $resultat;
	}

	public function deplacer ($x, $y){
		echo "En déplacement cood $x : $y";
	}

	public function setPV($PV){
		$this->PV = $PV;
	}

	public function setPM($PM){
		$this->PM = $PM;
	}

	public function setInt($int){
		$this->int = $int;
	}

	public function setFor($for){
		$this->for = $for;
	}

	public function setAgi($agi){
		$this->agi = $agi;
	}

	public function setXp($xp){
		$this->xp = $xp;
	}

	public function setSexe($sexe){
		$this->sexe = $sexe;
	}

	public function getName(){
		return $this->name;
	}

	public function getPV(){
		return $this->PV; 
	}

	public function getPM(){
		return $this->PM;
	}

	public function getInt(){
		return $this->int;
	}

	public function getFor(){
		return $this->for;
	}

	public function getAgi(){
		return $this->agi;
	}

	public function getXp(){
		return $this->xp;
	}

	public function getSexe(){
		return $this->sexe;
	}

	/**
	 * A voir avec la version PHP 5.6
	 */
	public function __debugInfo(){

		$debug = [
			'name'	=> $this->name,
			'for' 	=> $this->getFor(),
			'int' 	=> $this->getInt(),
			'agi' 	=> $this->getAgi(),
		]; 

		return $debug;
	}

	public function __sleep(){
		$array = ['name', 'PV', 'PM', 'for', 'int', 'agi', 'xp', 'sexe'];
		return $array;
	}

	public function __toString(){

		$helper = new $this->helper($this);

		return $helper->render();
	}
}