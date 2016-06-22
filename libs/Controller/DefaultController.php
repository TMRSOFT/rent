<?php
/** @package Rent::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Auto.php");
require_once("Model/TipoAuto.php");
require_once("Model/Marca.php");
require_once("Model/Cliente.php");
require_once("Model/Reserva.php");
/**
 * DefaultController is the entry point to the application
 *
 * @package Rent::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class DefaultController extends AppBaseController
{

	/**
	 * Override here for any controller-specific functionality
	 */
	protected function Init()
	{
		parent::Init();

		// TODO: add controller-wide bootstrap code
		
		// TODO: if authentiation is required for this entire controller, for example:
		// $this->RequirePermission(ExampleUser::$PERMISSION_USER,'SecureExample.LoginForm');
	}

	/**
	 * Display the home page for the application
	 */
	public function Home()
	{
        require_once 'Model/AutoCriteria.php';
        require_once 'Model/TipoAutoCriteria.php';
        require_once 'Model/MarcaCriteria.php';
        require_once 'Model/ClienteCriteria.php';
        require_once 'Model/ReservaCriteria.php';

        $autoCriteria = new AutoCriteria();
        $autoCriteria->Fkempresa_Equals = $_SESSION['empresa']->pkempresa;
        $autos = $this->Phreezer->Query('Auto',$autoCriteria);

        $tipoautoCriteria = new TipoAutoCriteria();
        $tipoautoCriteria->Fkempresa_Equals = $_SESSION['empresa']->pkempresa;
        $tipoautos = $this->Phreezer->Query('TipoAuto',$tipoautoCriteria);

        $marcaCriteria = new MarcaCriteria();
        $marcaCriteria->Fkempresa_Equals = $_SESSION['empresa']->pkempresa;
        $marcas = $this->Phreezer->Query('Marca',$marcaCriteria);

        $clienteCriteria = new ClienteCriteria();
        $clienteCriteria->Fkempresa_Equals = $_SESSION['empresa']->pkempresa;
        $clientes = $this->Phreezer->Query('Cliente',$clienteCriteria);

        $reservaCriteria = new ReservaCriteria();
        $reservaCriteria->Fkempresa_Equals = $_SESSION['empresa']->pkempresa;
        $reservas = $this->Phreezer->Query('Reserva',$reservaCriteria);

        $this->Assign('autos',$autos);
        $this->Assign('tipoautos',$tipoautos);
        $this->Assign('marcas',$marcas);
        $this->Assign('clientes',$clientes);
        $this->Assign('reservas',$reservas);

		$this->Render();
	}

	/**
	 * Displayed when an invalid route is specified
	 */
	public function Error404()
	{
		$this->Render();
	}

	/**
	 * Display a fatal error message
	 */
	public function ErrorFatal()
	{
		$this->Render();
	}

	public function ErrorApi404()
	{
		$this->RenderErrorJSON('An unknown API endpoint was requested.');
	}

}
?>