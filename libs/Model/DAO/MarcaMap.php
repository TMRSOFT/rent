<?php
/** @package    Rent::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * MarcaMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the MarcaDAO to the marca datastore.
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
class MarcaMap implements IDaoMap, IDaoMap2
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
			self::$FM["Pkmarca"] = new FieldMap("Pkmarca","marca","pkmarca",true,FM_TYPE_INT,11,null,true);
			self::$FM["Nombre"] = new FieldMap("Nombre","marca","nombre",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Pais"] = new FieldMap("Pais","marca","pais",false,FM_TYPE_VARCHAR,30,null,false);
			self::$FM["Fkempresa"] = new FieldMap("Fkempresa","marca","fkempresa",false,FM_TYPE_INT,11,null,false);
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