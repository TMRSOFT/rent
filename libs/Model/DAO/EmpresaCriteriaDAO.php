<?php
/** @package    Rent::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Criteria.php");

/**
 * EmpresaCriteria allows custom querying for the Empresa object.
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
class EmpresaCriteriaDAO extends Criteria
{

	public $Pkempresa_Equals;
	public $Pkempresa_NotEquals;
	public $Pkempresa_IsLike;
	public $Pkempresa_IsNotLike;
	public $Pkempresa_BeginsWith;
	public $Pkempresa_EndsWith;
	public $Pkempresa_GreaterThan;
	public $Pkempresa_GreaterThanOrEqual;
	public $Pkempresa_LessThan;
	public $Pkempresa_LessThanOrEqual;
	public $Pkempresa_In;
	public $Pkempresa_IsNotEmpty;
	public $Pkempresa_IsEmpty;
	public $Pkempresa_BitwiseOr;
	public $Pkempresa_BitwiseAnd;
	public $Nombre_Equals;
	public $Nombre_NotEquals;
	public $Nombre_IsLike;
	public $Nombre_IsNotLike;
	public $Nombre_BeginsWith;
	public $Nombre_EndsWith;
	public $Nombre_GreaterThan;
	public $Nombre_GreaterThanOrEqual;
	public $Nombre_LessThan;
	public $Nombre_LessThanOrEqual;
	public $Nombre_In;
	public $Nombre_IsNotEmpty;
	public $Nombre_IsEmpty;
	public $Nombre_BitwiseOr;
	public $Nombre_BitwiseAnd;
	public $Correo_Equals;
	public $Correo_NotEquals;
	public $Correo_IsLike;
	public $Correo_IsNotLike;
	public $Correo_BeginsWith;
	public $Correo_EndsWith;
	public $Correo_GreaterThan;
	public $Correo_GreaterThanOrEqual;
	public $Correo_LessThan;
	public $Correo_LessThanOrEqual;
	public $Correo_In;
	public $Correo_IsNotEmpty;
	public $Correo_IsEmpty;
	public $Correo_BitwiseOr;
	public $Correo_BitwiseAnd;
	public $PaginaWeb_Equals;
	public $PaginaWeb_NotEquals;
	public $PaginaWeb_IsLike;
	public $PaginaWeb_IsNotLike;
	public $PaginaWeb_BeginsWith;
	public $PaginaWeb_EndsWith;
	public $PaginaWeb_GreaterThan;
	public $PaginaWeb_GreaterThanOrEqual;
	public $PaginaWeb_LessThan;
	public $PaginaWeb_LessThanOrEqual;
	public $PaginaWeb_In;
	public $PaginaWeb_IsNotEmpty;
	public $PaginaWeb_IsEmpty;
	public $PaginaWeb_BitwiseOr;
	public $PaginaWeb_BitwiseAnd;
	public $AdministradorNombre_Equals;
	public $AdministradorNombre_NotEquals;
	public $AdministradorNombre_IsLike;
	public $AdministradorNombre_IsNotLike;
	public $AdministradorNombre_BeginsWith;
	public $AdministradorNombre_EndsWith;
	public $AdministradorNombre_GreaterThan;
	public $AdministradorNombre_GreaterThanOrEqual;
	public $AdministradorNombre_LessThan;
	public $AdministradorNombre_LessThanOrEqual;
	public $AdministradorNombre_In;
	public $AdministradorNombre_IsNotEmpty;
	public $AdministradorNombre_IsEmpty;
	public $AdministradorNombre_BitwiseOr;
	public $AdministradorNombre_BitwiseAnd;
	public $AdministradorApellido_Equals;
	public $AdministradorApellido_NotEquals;
	public $AdministradorApellido_IsLike;
	public $AdministradorApellido_IsNotLike;
	public $AdministradorApellido_BeginsWith;
	public $AdministradorApellido_EndsWith;
	public $AdministradorApellido_GreaterThan;
	public $AdministradorApellido_GreaterThanOrEqual;
	public $AdministradorApellido_LessThan;
	public $AdministradorApellido_LessThanOrEqual;
	public $AdministradorApellido_In;
	public $AdministradorApellido_IsNotEmpty;
	public $AdministradorApellido_IsEmpty;
	public $AdministradorApellido_BitwiseOr;
	public $AdministradorApellido_BitwiseAnd;
	public $Administrador_Equals;
	public $Administrador_NotEquals;
	public $Administrador_IsLike;
	public $Administrador_IsNotLike;
	public $Administrador_BeginsWith;
	public $Administrador_EndsWith;
	public $Administrador_GreaterThan;
	public $Administrador_GreaterThanOrEqual;
	public $Administrador_LessThan;
	public $Administrador_LessThanOrEqual;
	public $Administrador_In;
	public $Administrador_IsNotEmpty;
	public $Administrador_IsEmpty;
	public $Administrador_BitwiseOr;
	public $Administrador_BitwiseAnd;
	public $Plan_Equals;
	public $Plan_NotEquals;
	public $Plan_IsLike;
	public $Plan_IsNotLike;
	public $Plan_BeginsWith;
	public $Plan_EndsWith;
	public $Plan_GreaterThan;
	public $Plan_GreaterThanOrEqual;
	public $Plan_LessThan;
	public $Plan_LessThanOrEqual;
	public $Plan_In;
	public $Plan_IsNotEmpty;
	public $Plan_IsEmpty;
	public $Plan_BitwiseOr;
	public $Plan_BitwiseAnd;
	public $Llave_Equals;
	public $Llave_NotEquals;
	public $Llave_IsLike;
	public $Llave_IsNotLike;
	public $Llave_BeginsWith;
	public $Llave_EndsWith;
	public $Llave_GreaterThan;
	public $Llave_GreaterThanOrEqual;
	public $Llave_LessThan;
	public $Llave_LessThanOrEqual;
	public $Llave_In;
	public $Llave_IsNotEmpty;
	public $Llave_IsEmpty;
	public $Llave_BitwiseOr;
	public $Llave_BitwiseAnd;
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

}

?>