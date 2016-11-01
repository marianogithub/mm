<?php
defined('SYSPATH') OR die('No Direct Script Access');

require_once 'application/classes/util/controllerUtil.php';

class VistaGenerica {
	//atributos que se usarán en las vistas.-
	private $encabezado;
	private $nombreColumnas;
	private $nombreControlador;
	private $listado;
	private $objeto;
    //LABELS que mostramos en la página.-
    private $nuevoLabel;
    private $editarLabel;
    private $eliminarLabel;
    private $confirmarLabel;
    private $cancelarLabel;
    private $volverLabel;
    private $confirmSi;
    private $confirmNo;
    private $confirmMsj;
	//fin atributos.-

	function __construct() {

	}

	//funcionalidades
    public function getNewButton($attributesParam = array(), $extraURL = null) {
        $attributesParam = $attributesParam == null ? array() : $attributesParam;
        $defaultsAttributes = array(
            'onClick' => "javascript: location.href='" . $this->getUrlNew() . ($extraURL != null ? $extraURL : "" ) . "'",
            'id' => "idButtonNew",
            'class' => "btn btn-danger"
        );

        $attributes = array_merge($defaultsAttributes, $attributesParam);
        return $this->getGenericButton($attributes, $this->nuevoLabel, $this->nuevoLabel);
    }
    public function getCancelarButton($attributesParam = array(), $extraURL = null) {
        $attributesParam = $attributesParam == null ? array() : $attributesParam;
        $defaultsAttributes = array(
            'onClick' => "javascript: location.href='" . $this->getUrlListado() . ($extraURL != null ? $extraURL : "" ) . "'",
            'id' => "idButtonCancelar",
            'class' => "btn"
        );

        $attributes = array_merge($defaultsAttributes, $attributesParam);
        return $this->getGenericButton($attributes, $this->cancelarLabel, $this->cancelarLabel);
    }
    public function getConfirmarButton($attributesParam = array()) {
        $attributesParam = $attributesParam == null ? array() : $attributesParam;
        $defaultsAttributes = array(
            'type' => "submit",
            'id' => "idButtonConfirmar",
            'class' => "btn btn-primary"
        );

        $attributes = array_merge($defaultsAttributes, $attributesParam);
        return $this->getGenericButton($attributes, $this->confirmarLabel, $this->confirmarLabel);
    }
    public function getVolverButton($attributesParam = array(), $extraURL = null) {
        $attributesParam = $attributesParam == null ? array() : $attributesParam;
        $defaultsAttributes = array(
            'id' => "idButtonVolver",
            'class' => "btn"
        );
        if($extraURL != null) {
            $defaultsAttributes['onClick'] = "javascript: location.href='" . Kohana::$base_url . Kohana::$index_file . $extraURL . "'";
        }

        $attributes = array_merge($defaultsAttributes, $attributesParam);
        return $this->getGenericButton($attributes, $this->volverLabel, $this->volverLabel);
    }
    private function getGenericButton($attributesParam = array(), $nameAttribute = "nameAttribute", $buttonBody = "buttonBody") {
        return
            $this->getButton(
                $nameAttribute,
                $buttonBody,
                $attributesParam
            )
        ;
    }
    public function getButton($nameAttribute = "botonAttribute", $buttonBody = "botonBody", $attributesParam = array()) {
        $attributes = $attributesParam == null ? array() : $attributesParam;
        if(!array_key_exists("type", $attributes)) {
            $attributes["type"] = "button";
        }

        return
            Form::button(
                $nameAttribute,
                $buttonBody,
                $attributes
            )
        ;
    }
	public function getEditLink( $idElementoAEditar, $label = null ) {
		return $this->getLinkEditDelete( 1, $idElementoAEditar, $label );
	}
	public function getDeleteLink( $idElementoAEliminar, $label = null ) {
		return $this->getLinkEditDelete( 2, $idElementoAEliminar, $label );
	}
	/**
	 * 
	 * Crea el link html según los parámetros.-
	 * @param unknown_type $label, nombre visible para el link.-
	 * @param unknown_type $parametros, parametros que se quieren pasar a través del link.-
	 */
	public function getLink( $label, $parametros )
	{
		$linkStr = Kohana::$index_file . "/" . Request::$current->uri( $parametros );

		return html::anchor( $linkStr, $label );
	}
	//fin funcionalidades

	private function getLinkEditDelete( $accion, $id, $label = null ) {
		$accionStr = $accion == 1 ? "edit" : "delete";
		$mensajeStr = $label != null ? $label : ($accion == 1 ? $this->editarLabel : $this->eliminarLabel);
		$params = "id=$id";

		$linkStr = Kohana::$base_url . Kohana::$index_file . "/" . Request::$current->uri(array('action' => $accionStr, 'id' => $params));

        //si estamos editando...
        if($accion == 1){
            $htmlEditDelete =
                '<button type="button" class="btn btn-link" onclick="javascript: location.href=\''.$linkStr.'\'" >'.$mensajeStr.'</button>';
        } else {
            $htmlEditDelete =
                "<button type='button' class='btn btn-link' data-toggle='confirmation' data-placement='bottom' " .
                "data-btn-ok-icon='glyphicon glyphicon-share-alt' data-btn-ok-class='btn-success' data-btn-cancel-class='btn-danger' " .
                "data-btn-ok-label='".$this->confirmSi."' ".
                "title='".$this->confirmMsj."' data-href='". $linkStr."' ".
                "data-btn-cancel-label='".$this->confirmNo."' data-btn-cancel-icon='glyphicon glyphicon-ban-circle' ".
                ">$mensajeStr</button>";
        }

		return $htmlEditDelete;
	}
	public function getUrlListado()
	{
		return Kohana::$base_url . Kohana::$index_file . "/" . $this->parsearNombreControlador() . "/index";
	}
	public function getUrlSave()
	{
		return Kohana::$base_url . Kohana::$index_file . "/" . $this->parsearNombreControlador() . "/save";
	}
	public function getUrlNew()
	{
		return Kohana::$base_url . Kohana::$index_file . "/" . $this->parsearNombreControlador() . "/new";
	}
	public function getUrl( $action )
	{
		return Kohana::$base_url . Kohana::$index_file . "/" . $this->parsearNombreControlador() . "/$action";
	}
	public function getUrlBase( $controlador, $action, $parametros )
	{
		$url = "";

		$url .= Kohana::$base_url . Kohana::$index_file . "/$controlador";

		if( $action != null && ( strcmp( $action, "" ) != 0 ) )
		{
			$url .= "/$action";
		}

		if( $parametros != null && ( strcmp( $parametros, "" ) != 0 ) )
		{
			$url .= "/$parametros";
		}

		return $url;
	}
	private function parsearNombreControlador() {
        $controllerUtil = new ControllerUtil();
		return $controllerUtil->getControllerName($this->nombreControlador);
	}

	//getters y setters
	public function getListado()
	{
		return $this->listado;
	}
	public function setListado( $listado )
	{
		$this->listado = $listado;
	}
	public function getNombreColumnas()
	{
		return $this->nombreColumnas;
	}
	public function setNombreColumnas( $nombreColumnas )
	{
		$this->nombreColumnas = $nombreColumnas;
	}
	public function getEncabezado()
	{
		return $this->encabezado;
	}
	public function setEncabezado( $encabezado )
	{
		$this->encabezado = $encabezado;
	}
	public function getNombreControlador()
	{
		return $this->nombreControlador;
	}
	public function setNombreControlador( $nombreControlador )
	{
		$this->nombreControlador = $nombreControlador;
	}
	public function getObjeto()
	{
		return $this->objeto;
	}
	public function setObjeto( $objeto )
	{
		$this->objeto = $objeto;
	}
    public function getNuevoLabel()
    {
        return $this->nuevoLabel;
    }
    public function setNuevoLabel( $nuevoLabel )
    {
        $this->nuevoLabel = $nuevoLabel;
    }
    public function getEditarLabel()
    {
        return $this->editarLabel;
    }
    public function setEditarLabel( $editarLabel )
    {
        $this->editarLabel = $editarLabel;
    }
    public function getEliminarLabel()
    {
        return $this->eliminarLabel;
    }
    public function setEliminarLabel( $eliminarLabel )
    {
        $this->eliminarLabel = $eliminarLabel;
    }
    public function getCancelarLabel()
    {
        return $this->cancelarLabel;
    }
    public function setCancelarLabel( $cancelarLabel )
    {
        $this->cancelarLabel = $cancelarLabel;
    }
    public function getVolverLabel()
    {
        return $this->volverLabel;
    }
    public function setVolverLabel( $volverLabel )
    {
        $this->volverLabel = $volverLabel;
    }
    public function getConfirmarLabel()
    {
        return $this->confirmarLabel;
    }
    public function setConfirmarLabel( $confirmarLabel )
    {
        $this->confirmarLabel = $confirmarLabel;
    }
    public function setConfirmSi( $confirmSi ) {
        $this->confirmSi = $confirmSi;
    }
    public function setConfirmNo( $confirmNo ) {
        $this->confirmNo = $confirmNo;
    }
    public function setConfirmMsj( $confirmMsj ) {
        $this->confirmMsj = $confirmMsj;
    }
}
?>