<?php

class Hero_Manager {

	protected $pdo;

	public function __construct(){
		$db = new Db_Connection("mysql:host=localhost;dbname=project", "project", "0000");
		$this->pdo = $db->getConnection();
	}

	public function save(Hero $hero){
		$infoHero = array();

		$infoHero['name'] = $hero->getName();
		$infoHero['class'] = get_class($hero);
		$infoHero['pv'] = $hero->getPV();
		$infoHero['pm'] = $hero->getPM();
		$infoHero['agi'] = $hero->getAgi();
		$infoHero['for'] = $hero->getFor();
		$infoHero['int'] = $hero->getInt();
		$infoHero['sexe'] = $hero->getSexe();
		

		$sql = "INSERT INTO `project`.`hero` (`name`, `class`, `pv`, `pm`, `agi`, `for`, `int`, `sexe`)"
		 	  . "VALUES (:name, :class, :pv, :pm, :agi, :for, :int, :sexe);";

		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($infoHero);

	}
/*
	public function list(){

		$sql = "SELECT * FROM `project`.`hero`;";

		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();

		$listHero  = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $listHero;
	}
*/
}