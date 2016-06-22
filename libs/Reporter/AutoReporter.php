<?php
/** @package    Rent::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the Auto object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package Rent::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class AutoReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `auto` table
    public $marcaNombre;
    public $tipoautoNombre;

	public $Placa;
	public $Modelo;
	public $Fkmarca;
	public $FktipoAuto;
	public $Ano;
	public $Motor;
	public $Color;
	public $NroPuertas;
	public $Capacidad;
	public $PrecioPorDia;
	public $TipoCombustible;
	public $CapacidadCombustible;
	public $TipoCaja;
	public $Estado;
	public $Foto;
	public $Fkempresa;

	/*
	* GetCustomQuery returns a fully formed SQL statement.  The result columns
	* must match with the properties of this reporter object.
	*
	* @see Reporter::GetCustomQuery
	* @param Criteria $criteria
	* @return string SQL statement
	*/
	static function GetCustomQuery($criteria)
	{
		$sql = "select
			`marca`.`nombre` as marcaNombre
			,`tipo_auto`.`nombre` as tipoautoNombre
			,`auto`.`placa` as Placa
			,`auto`.`modelo` as Modelo
			,`auto`.`fkmarca` as Fkmarca
			,`auto`.`fktipo_auto` as FktipoAuto
			,`auto`.`ano` as Ano
			,`auto`.`motor` as Motor
			,`auto`.`color` as Color
			,`auto`.`nro_puertas` as NroPuertas
			,`auto`.`capacidad` as Capacidad
			,`auto`.`precio_por_dia` as PrecioPorDia
			,`auto`.`tipo_combustible` as TipoCombustible
			,`auto`.`capacidad_combustible` as CapacidadCombustible
			,`auto`.`tipo_caja` as TipoCaja
			,`auto`.`condicion` as Condicion
			,`auto`.`foto` as Foto
			,`auto`.`estado` as Estado
			,`auto`.`fkempresa` as Fkempresa
		FROM `auto`
		INNER JOIN `marca` on `fkmarca` = `pkmarca`
		INNER JOIN `tipo_auto` on `fktipo_auto` = `pktipo_auto`
		WHERE `auto`.`fkempresa` =".$_SESSION['empresa']->pkempresa;



		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();
		$sql .= $criteria->GetOrder();

		return $sql;
	}
	
	/*
	* GetCustomCountQuery returns a fully formed SQL statement that will count
	* the results.  This query must return the correct number of results that
	* GetCustomQuery would, given the same criteria
	*
	* @see Reporter::GetCustomCountQuery
	* @param Criteria $criteria
	* @return string SQL statement
	*/
	static function GetCustomCountQuery($criteria)
	{
		$sql = "select count(1) as counter from `auto`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?>