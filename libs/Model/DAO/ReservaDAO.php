<?php
/** @package Rent::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Phreezable.php");
require_once("ReservaMap.php");

/**
 * ReservaDAO provides object-oriented access to the reserva table.  This
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
class ReservaDAO extends Phreezable
{
    /** @var int */
    public $Pkreserva;

    /** @var date */
    public $FechaIni;

    /** @var date */
    public $FechaFin;

    /** @var int */
    public $Precio;

    /** @var int */
    public $Fkcliente;

    /** @var int */
    public $Fkauto;

    /** @var int */
    public $Fkempresa;



}
?>