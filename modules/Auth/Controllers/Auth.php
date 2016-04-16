<?php
namespace modules\Auth\Controllers;
use core\CoreController;
Class Auth extends CoreController
{	

	function __construct(){
			
	} 

	public function login(){
		//echo $this->reg->getVarConf;
		$this->test();
		return  "this is login-solve sesion";
	}
	
	public function Yahoo(){
		return "this is yahoo";
	}
}
