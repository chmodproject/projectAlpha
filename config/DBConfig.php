<?php
namespace config;
Class DBConfig {
	private $db=[];
	
	public function __construct(){
		$this->db['title']="mywebsite";	
		$this->db['driver']="pdo_mysql";	
		$this->db['user']="root";	
		$this->db['password']="12345678";	
		$this->db['dbname']="projectx";
	}

	public function getdbConf($key){
		return $this->db[$key];
	}

	public function setdbConf($key,$val){
		return $this->db[$key]=$val;
	}
}

