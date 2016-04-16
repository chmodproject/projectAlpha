<?php
namespace core;
use Symfony\Component\Templating\PhpEngine;
use Symfony\Component\Templating\TemplateNameParser;
use Symfony\Component\Templating\Loader\FilesystemLoader;
use config\RegConfig;


Class CoreController{

	private $template;

	function __construct(){ 
		parent::__construct();
		$loader = new FilesystemLoader(ROOTDIR.'/modules/'.$this->reg->getVarConf('module').'/Views/%name%');
		$this->template = new PhpEngine(new TemplateNameParser(), $loader);
	}

	public function view($filename,$data=array(),$module,$return=true){
		
		$html=$this->$template->render($filename, $data);
		if($return){
			return $html;
		}else{
			echo $html;
		}
	}

	public function test(){
		
		
		//echo $this->getRgie();
	}

}

