<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->group('admin', ['filter' => 'role:admin'], function($routes) {
	$routes->get('dashboard', 'Admin\Dashboard::index');

	$routes->get('patients', 'Admin\Dashboard::patients');
	$routes->get('patients/add', 'Admin\Dashboard::add_patients');
	$routes->post('patients/save', 'Admin\Dashboard::save_patients');
	$routes->get('patients/edit/(:segment)', 'Admin\Dashboard::edit_patients/$1');
	$routes->post('patients/update', 'Admin\Dashboard::update_patients');
	$routes->get('patients/delete/(:segment)', 'Admin\Dashboard::delete_patients/$1');
	$routes->get('patients/patient_card/(:segment)', 'Admin\Dashboard::print_card/$1');

	$routes->get('treatments', 'Admin\Dashboard::treatments');
	$routes->get('treatments/add', 'Admin\Dashboard::add_treatments');
	$routes->post('treatments/save', 'Admin\Dashboard::save_treatments');
	$routes->get('treatments/edit/(:segment)', 'Admin\Dashboard::edit_treatments/$1');
	$routes->post('treatments/update', 'Admin\Dashboard::update_treatments');
	$routes->get('treatments/delete/(:segment)', 'Admin\Dashboard::delete_treatments/$1');

	$routes->get('family-planning', 'Admin\Dashboard::family_planning');
	$routes->get('family-planning/add', 'Admin\Dashboard::add_family_planning');
	$routes->post('family-planning/save', 'Admin\Dashboard::save_family_planning');
	$routes->get('family-planning/edit/(:segment)', 'Admin\Dashboard::edit_family_planning/$1');
	$routes->post('family-planning/update', 'Admin\Dashboard::update_family_planning');
	$routes->get('family-planning/delete/(:segment)', 'Admin\Dashboard::delete_planning/$1');

	$routes->get('anc-usg', 'Admin\Dashboard::anc_usg');
	$routes->get('anc-usg/add', 'Admin\Dashboard::add_anc_usg');
	$routes->post('anc-usg/save', 'Admin\Dashboard::save_anc_usg');
	$routes->get('anc-usg/edit/(:segment)', 'Admin\Dashboard::edit_anc_usg/$1');
	$routes->post('anc-usg/update', 'Admin\Dashboard::update_anc_usg');
	$routes->get('anc-usg/delete/(:segment)', 'Admin\Dashboard::delete_anc_usg/$1');

	$routes->get('immunization', 'Admin\Dashboard::immunization');
	$routes->get('immunization/add', 'Admin\Dashboard::add_immunization');
	$routes->post('immunization/save', 'Admin\Dashboard::save_immunization');
	$routes->get('immunization/edit/(:segment)', 'Admin\Dashboard::edit_immunization/$1');
	$routes->post('immunization/update', 'Admin\Dashboard::update_immunization');
	$routes->get('immunization/delete/(:segment)', 'Admin\Dashboard::delete_immunization/$1');

	$routes->get('rapid', 'Admin\Dashboard::rapid');
	$routes->get('rapid/add', 'Admin\Dashboard::add_rapid');
	$routes->post('rapid/save', 'Admin\Dashboard::save_rapid');
	$routes->get('rapid/edit/(:segment)', 'Admin\Dashboard::edit_rapid/$1');
	$routes->post('rapid/update', 'Admin\Dashboard::update_rapid');
	$routes->get('rapid/delete/(:segment)', 'Admin\Dashboard::delete_rapid/$1');

	$routes->get('child-immunization', 'Admin\Dashboard::child_immune');
	$routes->get('child-immunization/add', 'Admin\Dashboard::add_child_immune');
	$routes->post('child-immunization/save', 'Admin\Dashboard::save_child_immune');
	$routes->get('child-immunization/edit/(:segment)', 'Admin\Dashboard::edit_child_immune/$1');
	$routes->post('child-immunization/update', 'Admin\Dashboard::update_child_immune');
	$routes->get('child-immunization/delete/(:segment)', 'Admin\Dashboard::delete_child_immune/$1');

	$routes->get('parturition', 'Admin\Dashboard::parturition');
	$routes->get('parturition/add', 'Admin\Dashboard::add_parturition');
	$routes->post('parturition/save', 'Admin\Dashboard::save_parturition');
	$routes->get('parturition/edit/(:segment)', 'Admin\Dashboard::edit_parturition/$1');
	$routes->post('parturition/update', 'Admin\Dashboard::update_parturition');
	$routes->get('parturition/delete/(:segment)', 'Admin\Dashboard::delete_parturition/$1');

	$routes->get('postpartum_mother', 'Admin\Dashboard::postpartum_mother');
	$routes->get('postpartum_mother/add', 'Admin\Dashboard::add_postpartum_mother');
	$routes->post('postpartum_mother/save', 'Admin\Dashboard::save_postpartum_mother');
	$routes->get('postpartum_mother/edit/(:segment)', 'Admin\Dashboard::edit_postpartum_mother/$1');
	$routes->post('postpartum_mother/update', 'Admin\Dashboard::update_postpartum_mother');
	$routes->get('postpartum_mother/delete/(:segment)', 'Admin\Dashboard::delete_postpartum_mother/$1');

	$routes->get('baby_at_birth', 'Admin\Dashboard::baby');
	$routes->get('baby_at_birth/add', 'Admin\Dashboard::add_baby');
	$routes->post('baby_at_birth/save', 'Admin\Dashboard::save_baby');
	$routes->get('baby_at_birth/edit/(:segment)', 'Admin\Dashboard::edit_baby/$1');
	$routes->post('baby_at_birth/update', 'Admin\Dashboard::update_baby');
	$routes->get('baby_at_birth/delete/(:segment)', 'Admin\Dashboard::delete_baby/$1');

	$routes->get('reference', 'Admin\Dashboard::ref');
	$routes->get('reference/add', 'Admin\Dashboard::add_ref');
	$routes->post('reference/save', 'Admin\Dashboard::save_ref');
	$routes->get('reference/edit/(:segment)', 'Admin\Dashboard::edit_ref/$1');
	$routes->post('reference/update', 'Admin\Dashboard::update_ref');
	$routes->get('reference/delete/(:segment)', 'Admin\Dashboard::delete_ref/$1');
	$routes->get('reference/print/(:segment)', 'Admin\Dashboard::print_ref/$1');

	$routes->get('report', 'Admin\Dashboard::report');
	$routes->get('report/print', 'Admin\Dashboard::print_report');
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
