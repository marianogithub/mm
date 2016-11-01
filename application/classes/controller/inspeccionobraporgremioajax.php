<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/Parametros.php';
require_once 'application/classes/controller/AppControllerTemplate.php';

/**
  * 
  */
class Controller_InspeccionObraPorGremioAjax extends App_Controller_Template
{
	function __construct($request, $response)
	{
		parent::__construct($request, $response);

		//$this->titulo			= "Tipos Insumo Por Proveedor";
		//$this->encabezado		= "Proveedor - Tipo Insumo";
		//$this->nombreColumnas	= Array( "ID", "Proveedor", "Tipo Insumo", "Editar", "Eliminar" );
		$this->nombreTabla		= "Inspeccionesobra";
		//$this->formulario		= "forms/proveedorTipoInsumoForm";
		//$this->listado			= "lists/proveedorTipoInsumoList";
	}

	function action_index() {
		$this->auto_render = false;
		$inspeccionesObra = "";

		$parametro = $this->request->param( Parametros::$params );
		$idgremioobs = Parametros::getValueFromParam( $parametro, "idgremioobs" );

		$inspeccionesFiltradas = ORM::factory( $this->nombreTabla )->getInspeccionesFiltradas($idgremioobs);

		foreach( $inspeccionesFiltradas as $inspeccion ) {
			$inspeccionesObra .= ",{";
			$inspeccionesObra .= "\"value\":" . $inspeccion->idlistado . ",";
			$inspeccionesObra .= "\"text\":\"" . $inspeccion->concepto . "\"";
			$inspeccionesObra .= "}";
		}
		if( strcmp( "", $inspeccionesObra ) != 0 ) {
			$inspeccionesObra = substr($inspeccionesObra, 1);
		}
		$inspeccionesObra = "{\"inspeccionesObra\":[" . $inspeccionesObra . "]}";

		echo $inspeccionesObra;
	}
}
?>