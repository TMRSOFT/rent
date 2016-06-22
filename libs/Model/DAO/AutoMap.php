<?php
/** @package    Rent::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * AutoMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the AutoDAO to the auto datastore.
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
class AutoMap implements IDaoMap, IDaoMap2
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
            self::$FM["Placa"] = new FieldMap("Placa","auto","placa",true,FM_TYPE_VARCHAR,8,null,false);
            self::$FM["Modelo"] = new FieldMap("Modelo","auto","modelo",false,FM_TYPE_VARCHAR,20,null,false);
            self::$FM["Fkmarca"] = new FieldMap("Fkmarca","auto","fkmarca",false,FM_TYPE_INT,11,null,false);
            self::$FM["FktipoAuto"] = new FieldMap("FktipoAuto","auto","fktipo_auto",false,FM_TYPE_INT,11,null,false);
            self::$FM["Ano"] = new FieldMap("Ano","auto","ano",false,FM_TYPE_INT,11,null,false);
            self::$FM["Motor"] = new FieldMap("Motor","auto","motor",false,FM_TYPE_VARCHAR,20,null,false);
            self::$FM["Color"] = new FieldMap("Color","auto","color",false,FM_TYPE_VARCHAR,20,null,false);
            self::$FM["NroPuertas"] = new FieldMap("NroPuertas","auto","nro_puertas",false,FM_TYPE_INT,11,null,false);
            self::$FM["Capacidad"] = new FieldMap("Capacidad","auto","capacidad",false,FM_TYPE_INT,11,null,false);
            self::$FM["PrecioPorDia"] = new FieldMap("PrecioPorDia","auto","precio_por_dia",false,FM_TYPE_INT,11,null,false);
            self::$FM["TipoCombustible"] = new FieldMap("TipoCombustible","auto","tipo_combustible",false,FM_TYPE_VARCHAR,20,null,false);
            self::$FM["CapacidadCombustible"] = new FieldMap("CapacidadCombustible","auto","capacidad_combustible",false,FM_TYPE_INT,11,null,false);
            self::$FM["TipoCaja"] = new FieldMap("TipoCaja","auto","tipo_caja",false,FM_TYPE_VARCHAR,20,null,false);
            self::$FM["Condicion"] = new FieldMap("Condicion","auto","condicion",false,FM_TYPE_VARCHAR,20,null,false);
            self::$FM["Foto"] = new FieldMap("Foto","auto","foto",false,FM_TYPE_BLOB,null,null,false);
            self::$FM["Estado"] = new FieldMap("Estado","auto","estado",false,FM_TYPE_TINYINT,1,"1",false);
            self::$FM["Fkempresa"] = new FieldMap("Fkempresa","auto","fkempresa",false,FM_TYPE_INT,11,null,false);
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