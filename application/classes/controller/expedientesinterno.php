<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/Parametros.php';
require_once 'application/classes/controller/expedientesadmin.php';
require_once 'application/classes/security/User.php';

/**
  * 
  */
class Controller_Expedientesinterno extends Controller_Expedientesadmin {
	function __construct($request, $response) {
		parent::__construct($request, $response);

		$this->titulo			= "Administraci�n Interna de Expedientes";
		$this->encabezado		= "Administraci�n Interna de Expedientes";
		/*$this->nombreColumnas	= Array(    "N� Expediente", "Titular",
                                            "Obras Solicitadas", "Adicionales de Obra",
                                            "Inspecciones Solicitadas",
											"Movimientos de Expediente", "Observaciones",
                                            "<br>", "<br>", "<br>");
		$this->nombreTabla		= "expedientes";
		$this->formulario		= "forms/expedientesBase";
		$this->listado			= "lists/expedientesAdminList";
		$this->puedeGuardar = true;
		$this->puedeEliminar = true;
        */
        $this->puedeModificarExpediente = false;
        $this->puedeEliminarExpediente = false;
	}
}
?>