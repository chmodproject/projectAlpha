<?php
require_once "vendor/autoload.php";



use Symfony\Component\Debug\Debug;
use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;
use routes\WebRoutes;

Debug::enable();
ErrorHandler::register();
ExceptionHandler::register();

new WebRoutes;	
