<?php
/** @package    Rent::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Criteria.php");

/**
 * AutoCriteria allows custom querying for the Auto object.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * Add any custom business logic to the ModelCriteria class which is extended from this class.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @inheritdocs
 * @package Rent::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class AutoCriteriaDAO extends Criteria
{

	public $Placa_Equals;
	public $Placa_NotEquals;
	public $Placa_IsLike;
	public $Placa_IsNotLike;
	public $Placa_BeginsWith;
	public $Placa_EndsWith;
	public $Placa_GreaterThan;
	public $Placa_GreaterThanOrEqual;
	public $Placa_LessThan;
	public $Placa_LessThanOrEqual;
	public $Placa_In;
	public $Placa_IsNotEmpty;
	public $Placa_IsEmpty;
	public $Placa_BitwiseOr;
	public $Placa_BitwiseAnd;
	public $Modelo_Equals;
	public $Modelo_NotEquals;
	public $Modelo_IsLike;
	public $Modelo_IsNotLike;
	public $Modelo_BeginsWith;
	public $Modelo_EndsWith;
	public $Modelo_GreaterThan;
	public $Modelo_GreaterThanOrEqual;
	public $Modelo_LessThan;
	public $Modelo_LessThanOrEqual;
	public $Modelo_In;
	public $Modelo_IsNotEmpty;
	public $Modelo_IsEmpty;
	public $Modelo_BitwiseOr;
	public $Modelo_BitwiseAnd;
	public $Fkmarca_Equals;
	public $Fkmarca_NotEquals;
	public $Fkmarca_IsLike;
	public $Fkmarca_IsNotLike;
	public $Fkmarca_BeginsWith;
	public $Fkmarca_EndsWith;
	public $Fkmarca_GreaterThan;
	public $Fkmarca_GreaterThanOrEqual;
	public $Fkmarca_LessThan;
	public $Fkmarca_LessThanOrEqual;
	public $Fkmarca_In;
	public $Fkmarca_IsNotEmpty;
	public $Fkmarca_IsEmpty;
	public $Fkmarca_BitwiseOr;
	public $Fkmarca_BitwiseAnd;
	public $FktipoAuto_Equals;
	public $FktipoAuto_NotEquals;
	public $FktipoAuto_IsLike;
	public $FktipoAuto_IsNotLike;
	public $FktipoAuto_BeginsWith;
	public $FktipoAuto_EndsWith;
	public $FktipoAuto_GreaterThan;
	public $FktipoAuto_GreaterThanOrEqual;
	public $FktipoAuto_LessThan;
	public $FktipoAuto_LessThanOrEqual;
	public $FktipoAuto_In;
	public $FktipoAuto_IsNotEmpty;
	public $FktipoAuto_IsEmpty;
	public $FktipoAuto_BitwiseOr;
	public $FktipoAuto_BitwiseAnd;
	public $Ano_Equals;
	public $Ano_NotEquals;
	public $Ano_IsLike;
	public $Ano_IsNotLike;
	public $Ano_BeginsWith;
	public $Ano_EndsWith;
	public $Ano_GreaterThan;
	public $Ano_GreaterThanOrEqual;
	public $Ano_LessThan;
	public $Ano_LessThanOrEqual;
	public $Ano_In;
	public $Ano_IsNotEmpty;
	public $Ano_IsEmpty;
	public $Ano_BitwiseOr;
	public $Ano_BitwiseAnd;
	public $Motor_Equals;
	public $Motor_NotEquals;
	public $Motor_IsLike;
	public $Motor_IsNotLike;
	public $Motor_BeginsWith;
	public $Motor_EndsWith;
	public $Motor_GreaterThan;
	public $Motor_GreaterThanOrEqual;
	public $Motor_LessThan;
	public $Motor_LessThanOrEqual;
	public $Motor_In;
	public $Motor_IsNotEmpty;
	public $Motor_IsEmpty;
	public $Motor_BitwiseOr;
	public $Motor_BitwiseAnd;
	public $Color_Equals;
	public $Color_NotEquals;
	public $Color_IsLike;
	public $Color_IsNotLike;
	public $Color_BeginsWith;
	public $Color_EndsWith;
	public $Color_GreaterThan;
	public $Color_GreaterThanOrEqual;
	public $Color_LessThan;
	public $Color_LessThanOrEqual;
	public $Color_In;
	public $Color_IsNotEmpty;
	public $Color_IsEmpty;
	public $Color_BitwiseOr;
	public $Color_BitwiseAnd;
	public $NroPuertas_Equals;
	public $NroPuertas_NotEquals;
	public $NroPuertas_IsLike;
	public $NroPuertas_IsNotLike;
	public $NroPuertas_BeginsWith;
	public $NroPuertas_EndsWith;
	public $NroPuertas_GreaterThan;
	public $NroPuertas_GreaterThanOrEqual;
	public $NroPuertas_LessThan;
	public $NroPuertas_LessThanOrEqual;
	public $NroPuertas_In;
	public $NroPuertas_IsNotEmpty;
	public $NroPuertas_IsEmpty;
	public $NroPuertas_BitwiseOr;
	public $NroPuertas_BitwiseAnd;
	public $Capacidad_Equals;
	public $Capacidad_NotEquals;
	public $Capacidad_IsLike;
	public $Capacidad_IsNotLike;
	public $Capacidad_BeginsWith;
	public $Capacidad_EndsWith;
	public $Capacidad_GreaterThan;
	public $Capacidad_GreaterThanOrEqual;
	public $Capacidad_LessThan;
	public $Capacidad_LessThanOrEqual;
	public $Capacidad_In;
	public $Capacidad_IsNotEmpty;
	public $Capacidad_IsEmpty;
	public $Capacidad_BitwiseOr;
	public $Capacidad_BitwiseAnd;
	public $PrecioPorDia_Equals;
	public $PrecioPorDia_NotEquals;
	public $PrecioPorDia_IsLike;
	public $PrecioPorDia_IsNotLike;
	public $PrecioPorDia_BeginsWith;
	public $PrecioPorDia_EndsWith;
	public $PrecioPorDia_GreaterThan;
	public $PrecioPorDia_GreaterThanOrEqual;
	public $PrecioPorDia_LessThan;
	public $PrecioPorDia_LessThanOrEqual;
	public $PrecioPorDia_In;
	public $PrecioPorDia_IsNotEmpty;
	public $PrecioPorDia_IsEmpty;
	public $PrecioPorDia_BitwiseOr;
	public $PrecioPorDia_BitwiseAnd;
	public $TipoCombustible_Equals;
	public $TipoCombustible_NotEquals;
	public $TipoCombustible_IsLike;
	public $TipoCombustible_IsNotLike;
	public $TipoCombustible_BeginsWith;
	public $TipoCombustible_EndsWith;
	public $TipoCombustible_GreaterThan;
	public $TipoCombustible_GreaterThanOrEqual;
	public $TipoCombustible_LessThan;
	public $TipoCombustible_LessThanOrEqual;
	public $TipoCombustible_In;
	public $TipoCombustible_IsNotEmpty;
	public $TipoCombustible_IsEmpty;
	public $TipoCombustible_BitwiseOr;
	public $TipoCombustible_BitwiseAnd;
	public $CapacidadCombustible_Equals;
	public $CapacidadCombustible_NotEquals;
	public $CapacidadCombustible_IsLike;
	public $CapacidadCombustible_IsNotLike;
	public $CapacidadCombustible_BeginsWith;
	public $CapacidadCombustible_EndsWith;
	public $CapacidadCombustible_GreaterThan;
	public $CapacidadCombustible_GreaterThanOrEqual;
	public $CapacidadCombustible_LessThan;
	public $CapacidadCombustible_LessThanOrEqual;
	public $CapacidadCombustible_In;
	public $CapacidadCombustible_IsNotEmpty;
	public $CapacidadCombustible_IsEmpty;
	public $CapacidadCombustible_BitwiseOr;
	public $CapacidadCombustible_BitwiseAnd;
	public $TipoCaja_Equals;
	public $TipoCaja_NotEquals;
	public $TipoCaja_IsLike;
	public $TipoCaja_IsNotLike;
	public $TipoCaja_BeginsWith;
	public $TipoCaja_EndsWith;
	public $TipoCaja_GreaterThan;
	public $TipoCaja_GreaterThanOrEqual;
	public $TipoCaja_LessThan;
	public $TipoCaja_LessThanOrEqual;
	public $TipoCaja_In;
	public $TipoCaja_IsNotEmpty;
	public $TipoCaja_IsEmpty;
	public $TipoCaja_BitwiseOr;
	public $TipoCaja_BitwiseAnd;
	public $Estado_Equals;
	public $Estado_NotEquals;
	public $Estado_IsLike;
	public $Estado_IsNotLike;
	public $Estado_BeginsWith;
	public $Estado_EndsWith;
	public $Estado_GreaterThan;
	public $Estado_GreaterThanOrEqual;
	public $Estado_LessThan;
	public $Estado_LessThanOrEqual;
	public $Estado_In;
	public $Estado_IsNotEmpty;
	public $Estado_IsEmpty;
	public $Estado_BitwiseOr;
	public $Estado_BitwiseAnd;
	public $Foto_Equals;
	public $Foto_NotEquals;
	public $Foto_IsLike;
	public $Foto_IsNotLike;
	public $Foto_BeginsWith;
	public $Foto_EndsWith;
	public $Foto_GreaterThan;
	public $Foto_GreaterThanOrEqual;
	public $Foto_LessThan;
	public $Foto_LessThanOrEqual;
	public $Foto_In;
	public $Foto_IsNotEmpty;
	public $Foto_IsEmpty;
	public $Foto_BitwiseOr;
	public $Foto_BitwiseAnd;
	public $Fkempresa_Equals;
	public $Fkempresa_NotEquals;
	public $Fkempresa_IsLike;
	public $Fkempresa_IsNotLike;
	public $Fkempresa_BeginsWith;
	public $Fkempresa_EndsWith;
	public $Fkempresa_GreaterThan;
	public $Fkempresa_GreaterThanOrEqual;
	public $Fkempresa_LessThan;
	public $Fkempresa_LessThanOrEqual;
	public $Fkempresa_In;
	public $Fkempresa_IsNotEmpty;
	public $Fkempresa_IsEmpty;
	public $Fkempresa_BitwiseOr;
	public $Fkempresa_BitwiseAnd;

}

?>