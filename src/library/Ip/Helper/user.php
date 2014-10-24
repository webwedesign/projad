<?php

class Helper_Hero {

	protected $hero;	

	public function __construct(Hero $hero) {
		$this->hero = $hero;
	}

	public function render(){
		$hero = $this->hero;
		$html = null;
		

		$html .= "<div>";
		$html .= "  <h3>" . $hero->getName() . "</h3>";
		$html .= "  <img width='100' src='/img/".str_replace(" ", "_", $hero->getName()).".png'>";
		$html .= "	<table>
						<thead>
							<tr>
								<th>Point de vie</th>
								<th>Point de mana</th>
								<th>Force</th>
								<th>Agilit&eacute;</th>
								<th>Intelligence</th>
							</tr>
						<thead>
						<tbody>
							<tr>
								<td>".$hero->getPV()."</td>
								<td>".$hero->getPM()."</td>
								<td>".$hero->getFor()."</td>
								<td>".$hero->getAgi()."</td>
								<td>".$hero->getInt()."</td>
							</tr>
						</tbody>
						";
		$html .= "	</table>";
		$html .= "</div>";



		return $html;
	}
}