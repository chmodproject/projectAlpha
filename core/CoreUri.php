<?php
namespace core;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernelInterface;

use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use	Symfony\Component\Routing\Exception\ResourceNotFoundException;

use Symfony\Component\HttpFoundation\Session\Session;

class CoreUri implements HttpKernelInterface
{
	protected $routes = array();
	public $register;

	public function __construct(){

		
		$this->routes = new RouteCollection();
	}

	public function handle(Request $request, $type = HttpKernelInterface::MASTER_REQUEST, $catch = true)
	{		
			$context = new RequestContext();
			
			$context->fromRequest($request);
			$rootDir=$_SERVER['DOCUMENT_ROOT'];

			$matcher = new UrlMatcher($this->routes, $context);
			
			try {
				$attributes = $matcher->match($request->getPathInfo());
				$controller = $attributes['controller'];
				unset($attributes['controller']);

				$filename=explode("->", $controller);
				$modulename=ucfirst($filename[0]);
				$methodname=ucfirst($filename[1]);
				$fileloc=$rootDir."/modules/".$modulename."/Controllers/".$modulename.".php";
				if(file_exists($fileloc)){
					
					$class = 'modules\\'.$modulename.'\Controllers'.'\\'.$modulename;
					$init=new $class();
					unset($attributes['_route']);
							
					if(count($attributes) > 0){ 
						$res=$init->$methodname($attributes);
					}else{
						$res=$init->$methodname();
					}
					return new Response($res);
				}else{
					return new Response('404!', Response::HTTP_NOT_FOUND);
				}

			} catch (ResourceNotFoundException $e) {
				return new Response('404!', Response::HTTP_NOT_FOUND);
			}
	}
	public function route($path, $controller) {  
		$this->routes->add($path, new Route($path,array('controller' => $controller)));
	}

	
}	
