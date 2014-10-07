<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class AdminController {

	public function getLogin(Request $request, Application $app) {
		return $app['twig']->render('admin/login.twig', [
			'error' => $app['security.last_error']($request),
			'last_username' => $app['session']->get('_security.last_username')
		]);
	}

	public function viewAdmin(Request $request, Application $app) {
		return $app['twig']->render('admin/admin.twig', []);
	}

}

