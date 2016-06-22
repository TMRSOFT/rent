<?php
/** @package    Rent::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * EmpresaMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the EmpresaDAO to the empresa datastore.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * You can override the default fetching strategies for KeyMaps in _config.php.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package Rent::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class EmpresaMap implements IDaoMap, IDaoMap2
{

	private static $KM;
	private static $FM;
	
	/**
	 * {@inheritdoc}
	 */
	public static function AddMap($property,FieldMap $map)
	{
		self::GetFieldMaps();
		self::$FM[$property] = $map;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public static function SetFetchingStrategy($property,$loadType)
	{
		self::GetKeyMaps();
		self::$KM[$property]->LoadType = $loadType;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function GetFieldMaps()
	{
		if (self::$FM == null)
		{
			self::$FM = Array();
			self::$FM["Pkempresa"] = new FieldMap("Pkempresa","empresa","pkempresa",true,FM_TYPE_INT,11,null,true);
			self::$FM["Nombre"] = new FieldMap("Nombre","empresa","nombre",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Correo"] = new FieldMap("Correo","empresa","correo",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["PaginaWeb"] = new FieldMap("PaginaWeb","empresa","pagina_web",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["AdministradorNombre"] = new FieldMap("AdministradorNombre","empresa","administrador_nombre",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["AdministradorApellido"] = new FieldMap("AdministradorApellido","empresa","administrador_apellido",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Administrador"] = new FieldMap("Administrador","empresa","administrador",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Plan"] = new FieldMap("Plan","empresa","plan",false,FM_TYPE_VARCHAR,30,null,false);
			self::$FM["Llave"] = new FieldMap("Llave","empresa","llave",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Estado"] = new FieldMap("Estado","empresa","estado",false,FM_TYPE_TINYINT,1,null,false);
		}
		return self::$FM;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function GetKeyMaps()
	{
		if (self::$KM == null)
		{
			self::$KM = Array();
		}
		return self::$KM;
	}

}

?>