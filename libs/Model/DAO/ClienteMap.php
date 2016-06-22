<?php
/** @package    Rent::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * ClienteMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the ClienteDAO to the cliente datastore.
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
class ClienteMap implements IDaoMap, IDaoMap2
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
			self::$FM["Pkcliente"] = new FieldMap("Pkcliente","cliente","pkcliente",true,FM_TYPE_INT,11,null,true);
			self::$FM["Ci"] = new FieldMap("Ci","cliente","ci",false,FM_TYPE_INT,11,null,false);
			self::$FM["Nombre"] = new FieldMap("Nombre","cliente","nombre",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Apellido"] = new FieldMap("Apellido","cliente","apellido",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Telefono"] = new FieldMap("Telefono","cliente","telefono",false,FM_TYPE_INT,11,null,false);
			self::$FM["Correo"] = new FieldMap("Correo","cliente","correo",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Fkempresa"] = new FieldMap("Fkempresa","cliente","fkempresa",false,FM_TYPE_INT,11,null,false);
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