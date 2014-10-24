<?php

class Test_Visible_Fille extends Test_Visible 
{
	public function __construct(){
		//$this->fPublic();
		$this->fProtected();
		$this->fPrivate();
	}
}