<?php
defined('SYSPATH') OR die('No Direct Script Access');

class VistaHead
{
	//atributos que se usarán en las vistas.-
	private $titulo;
	//fin atributos.-

	function __construct()
	{
		
	}

	//funcionalidades

	//getters y setters
	public function getTitulo()
	{
		return $this->titulo;
	}
	public function setTitulo( $titulo )
	{
		$this->titulo = $titulo;
	}
}
?>