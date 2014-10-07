<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class MainController {

	public function home(Request $request, Application $app){
		return $app['twig']->render('front/home.twig', []);
	}

	public function errorHandler(\Exception $e, $code) {
		switch($code) {
			case 404:
				return "404 error happened!";
				break;
			default:
				return "other error happened!";
				break;
		}
		return "";
	}
}

