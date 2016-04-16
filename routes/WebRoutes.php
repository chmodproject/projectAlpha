<?php
namespace routes;
use core\CoreUri;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


Class WebRoutes {

	public function __construct(){
		$request=Request::createFromGlobals();
		$init = new CoreUri();

		$init->route('/test/{testvar}','auth->login');

		$init->route('/', 'auth->yahoo');

		$init->route('/about/{name}','auth->login');

		$response = $init->handle($request);
		$response->send();
	}
}
