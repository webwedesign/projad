<?php

class Request {

	public function clean($dataDirty) {

		$dataClean = array();

		foreach ($dataDirty as $key => $value) {
			$keyClean = htmlentities(strip_tags($key));
			$dataClean[$keyClean] = htmlentities(strip_tags($value));
		}

		return $dataClean;
	}

	public function getPost() {

		$dataClean = $this->clean($_POST);

		return $dataClean;
	}

	public function getQuery() {

		$dataClean = $this->clean($_GET);

		return $dataClean;
	}

	public function getData(){

		$data = array_merge($this->getQuery(), $this->getPost());

		return $data;
	}

	public function isPost() {
		if(empty($_POST))
			return FALSE;

		return TRUE;
	}

	public function isGet() {
		return $this->isQuery();
	}

	public function isQuery() {
		if(empty($_GET))
			return FALSE;

		return TRUE;
	}
}