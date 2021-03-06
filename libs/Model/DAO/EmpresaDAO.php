<?php
/** @package Rent::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Phreezable.php");
require_once("EmpresaMap.php");

/**
 * EmpresaDAO provides object-oriented access to the empresa table.  This
 * class is automatically generated by ClassBuilder.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * Add any custom business logic to the Model class which is extended from this DAO class.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package Rent::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class EmpresaDAO extends Phreezable
{
	/** @var int */
	public $Pkempresa;

	/** @var string */
	public $Nombre;

	/** @var string */
	public $Correo;

	/** @var string */
	public $PaginaWeb;

	/** @var string */
	public $AdministradorNombre;

	/** @var string */
	public $AdministradorApellido;

	/** @var string */
	public $Administrador;

	/** @var string */
	public $Plan;

	/** @var string */
	public $Llave;

	/** @var int */
	public $Estado;



}
?>