<?php
/**
 * @package RENT
 *
 * APPLICATION-WIDE CONFIGURATION SETTINGS
 *
 * This file contains application-wide configuration settings.  The settings
 * here will be the same regardless of the machine on which the app is running.
 *
 * This configuration should be added to version control.
 *
 * No settings should be added to this file that would need to be changed
 * on a per-machine basic (ie local, staging or production).  Any
 * machine-specific settings should be added to _machine_config.php
 */

/**
 * APPLICATION ROOT DIRECTORY
 * If the application doesn't detect this correctly then it can be set explicitly
 */
if (!GlobalConfig::$APP_ROOT) GlobalConfig::$APP_ROOT = realpath("./");

/**
 * check is needed to ensure asp_tags is not enabled
 */
if (ini_get('asp_tags')) 
	die('<h3>Server Configuration Problem: asp_tags is enabled, but is not compatible with Savant.</h3>'
	. '<p>You can disable asp_tags in .htaccess, php.ini or generate your app with another template engine such as Smarty.</p>');

/**
 * INCLUDE PATH
 * Adjust the include path as necessary so PHP can locate required libraries
 */
set_include_path(
		GlobalConfig::$APP_ROOT . '/libs/' . PATH_SEPARATOR .
		GlobalConfig::$APP_ROOT . '/../phreeze/libs' . PATH_SEPARATOR .
		GlobalConfig::$APP_ROOT . '/vendor/phreeze/phreeze/libs/' . PATH_SEPARATOR .
		get_include_path()
);

/**
 * COMPOSER AUTOLOADER
 * Uncomment if Composer is being used to manage dependencies
 */
// $loader = require 'vendor/autoload.php';
// $loader->setUseIncludePath(true);

/**
 * SESSION CLASSES
 * Any classes that will be stored in the session can be added here
 * and will be pre-loaded on every page
 */
require_once "App/ExampleUser.php";

/**
 * RENDER ENGINE
 * You can use any template system that implements
 * IRenderEngine for the view layer.  Phreeze provides pre-built
 * implementations for Smarty, Savant and plain PHP.
 */
require_once 'verysimple/Phreeze/SavantRenderEngine.php';
GlobalConfig::$TEMPLATE_ENGINE = 'SavantRenderEngine';
GlobalConfig::$TEMPLATE_PATH = GlobalConfig::$APP_ROOT . '/templates/';

/**
 * ROUTE MAP
 * The route map connects URLs to Controller+Method and additionally maps the
 * wildcards to a named parameter so that they are accessible inside the
 * Controller without having to parse the URL for parameters such as IDs
 */
GlobalConfig::$ROUTE_MAP = array(

	// default controller when no route specified
	'GET:' => array('route' => 'Default.Home'),
		
	// example authentication routes
	'GET:loginform' => array('route' => 'SecureExample.LoginForm'),
	'POST:login' => array('route' => 'SecureExample.Login'),
	'GET:secureuser' => array('route' => 'SecureExample.UserPage'),
	'GET:secureadmin' => array('route' => 'SecureExample.AdminPage'),
	'GET:logout' => array('route' => 'SecureExample.Logout'),
		
	// Auto
	'GET:autos' => array('route' => 'Auto.ListView'),
	'GET:auto/(:any)' => array('route' => 'Auto.SingleView', 'params' => array('placa' => 1)),
	'GET:api/autos' => array('route' => 'Auto.Query'),
	'POST:api/auto' => array('route' => 'Auto.Create'),
	'GET:api/auto/(:any)' => array('route' => 'Auto.Read', 'params' => array('placa' => 2)),
	'PUT:api/auto/(:any)' => array('route' => 'Auto.Update', 'params' => array('placa' => 2)),
	'DELETE:api/auto/(:any)' => array('route' => 'Auto.Delete', 'params' => array('placa' => 2)),
		
	// Cliente
	'GET:clientes' => array('route' => 'Cliente.ListView'),
	'GET:cliente/(:num)' => array('route' => 'Cliente.SingleView', 'params' => array('pkcliente' => 1)),
	'GET:api/clientes' => array('route' => 'Cliente.Query'),
	'POST:api/cliente' => array('route' => 'Cliente.Create'),
	'GET:api/cliente/(:num)' => array('route' => 'Cliente.Read', 'params' => array('pkcliente' => 2)),
	'PUT:api/cliente/(:num)' => array('route' => 'Cliente.Update', 'params' => array('pkcliente' => 2)),
	'DELETE:api/cliente/(:num)' => array('route' => 'Cliente.Delete', 'params' => array('pkcliente' => 2)),
		
	// Empresa
	'GET:empresas' => array('route' => 'Empresa.ListView'),
	'GET:empresa/(:num)' => array('route' => 'Empresa.SingleView', 'params' => array('pkempresa' => 1)),
	'GET:api/empresas' => array('route' => 'Empresa.Query'),
	'POST:api/empresa' => array('route' => 'Empresa.Create'),
	'GET:api/empresa/(:num)' => array('route' => 'Empresa.Read', 'params' => array('pkempresa' => 2)),
	'PUT:api/empresa/(:num)' => array('route' => 'Empresa.Update', 'params' => array('pkempresa' => 2)),
	'DELETE:api/empresa/(:num)' => array('route' => 'Empresa.Delete', 'params' => array('pkempresa' => 2)),
		
	// Marca
	'GET:marcas' => array('route' => 'Marca.ListView'),
	'GET:marca/(:num)' => array('route' => 'Marca.SingleView', 'params' => array('pkmarca' => 1)),
	'GET:api/marcas' => array('route' => 'Marca.Query'),
	'POST:api/marca' => array('route' => 'Marca.Create'),
	'GET:api/marca/(:num)' => array('route' => 'Marca.Read', 'params' => array('pkmarca' => 2)),
	'PUT:api/marca/(:num)' => array('route' => 'Marca.Update', 'params' => array('pkmarca' => 2)),
	'DELETE:api/marca/(:num)' => array('route' => 'Marca.Delete', 'params' => array('pkmarca' => 2)),
		
	// Reserva
	'GET:reservas' => array('route' => 'Reserva.ListView'),
	'GET:reserva/(:num)' => array('route' => 'Reserva.SingleView', 'params' => array('pkreserva' => 1)),
	'GET:api/reservas' => array('route' => 'Reserva.Query'),
	'POST:api/reserva' => array('route' => 'Reserva.Create'),
	'GET:api/reserva/(:num)' => array('route' => 'Reserva.Read', 'params' => array('pkreserva' => 2)),
	'PUT:api/reserva/(:num)' => array('route' => 'Reserva.Update', 'params' => array('pkreserva' => 2)),
	'DELETE:api/reserva/(:num)' => array('route' => 'Reserva.Delete', 'params' => array('pkreserva' => 2)),
		
	// TipoAuto
	'GET:tipoautos' => array('route' => 'TipoAuto.ListView'),
	'GET:tipoauto/(:num)' => array('route' => 'TipoAuto.SingleView', 'params' => array('pktipoAuto' => 1)),
	'GET:api/tipoautos' => array('route' => 'TipoAuto.Query'),
	'POST:api/tipoauto' => array('route' => 'TipoAuto.Create'),
	'GET:api/tipoauto/(:num)' => array('route' => 'TipoAuto.Read', 'params' => array('pktipoAuto' => 2)),
	'PUT:api/tipoauto/(:num)' => array('route' => 'TipoAuto.Update', 'params' => array('pktipoAuto' => 2)),
	'DELETE:api/tipoauto/(:num)' => array('route' => 'TipoAuto.Delete', 'params' => array('pktipoAuto' => 2)),

	// catch any broken API urls
	'GET:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'PUT:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'POST:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'DELETE:api/(:any)' => array('route' => 'Default.ErrorApi404')
);

/**
 * FETCHING STRATEGY
 * You may uncomment any of the lines below to specify always eager fetching.
 * Alternatively, you can copy/paste to a specific page for one-time eager fetching
 * If you paste into a controller method, replace $G_PHREEZER with $this->Phreezer
 */
?>