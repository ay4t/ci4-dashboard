<?php

namespace Config;
/*
 * File: Routes.php
 * Project: Config
 * Created Date: Fr Dec 2021
 * Author: Ayatulloh Ahad R
 * Email: ayatulloh@indiega.net
 * Phone: 085791555506
 * -----
 * Last Modified: Mon Dec 06 2021
 * Modified By: Ayatulloh Ahad R
 * -----
 * Copyright (c) 2021 Indiega Network
 * -----
 * HISTORY:
 * Date      	By	Comments
 * ----------	---	---------------------------------------------------------
 */


// Create a new instance of our RouteCollection class.
$routes = Services::routes();

if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}


/*
 * --------------------------------------------------------------------
 * Route ay4t Dashboard Definitions
 * --------------------------------------------------------------------
 */
$routes->group('dashboard', ['namespace' => 'IDGdashboard\Controllers'], function ($routes) {

	/**
	 * set default route to dashboard page
	 */
	$routes->get('/', 'Dashboard::index');

	/**
	 * create dynamic routes for dashboard Controller Class
	 */
	$routes->get('(:alpha)', function ($e) {
		/**
		 * format class name from string
		 */
		$getClassName = str_replace('_', '', ucwords($e));
		$className = '\IDGdashboard\Controllers\Dashboard\\' . $getClassName;

		if (!class_exists($className)) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

		$newClass = new $className();
		return $newClass->index();
	});



	/**
	 * create dynamic routes for CRUD generator
	 */
	$crud_route_suffix = ['add', 'ajax_list_info', 'ajax_list'];
	foreach ($crud_route_suffix as $routeSuffix) {
		$routes->add('(:alpha)/' . $routeSuffix, function ($e) {
			/**
			 * format class name from string
			 */
			$getClassName = str_replace('_', '', ucwords($e));
			$className = '\IDGdashboard\Controllers\Dashboard\\' . $getClassName;

			if (!class_exists($className)) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

			$newClass = new $className();
			return $newClass->index();
		});
	}
});
