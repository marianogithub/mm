<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/Parametros.php';
require_once 'application/classes/controller/AppControllerTemplate.php';
require_once 'application/classes/util/phpExcel/Classes/PHPExcel.php';
require_once 'application/classes/util/phpExcel/Classes/PHPExcel/Writer/Excel2007.php';
require_once 'application/classes/util/numberUtil.php';

/**
  * 
  */
class Controller_ImprimirAforoBase extends App_Controller_Template {
	protected $urlVolver = null;
    protected $urlVolverLabel = "Volver a Expedientes";
    protected $isAdmin = false;

    private $worksheet;

	function __construct($request, $response) {
		parent::__construct($request, $response);

		$this->titulo			= "Impresión de Aforo";
		$this->encabezado		= "Impresión de Aforo";

		$this->nombreColumnas =
            Array(
                "Artículo", "Inciso", "Ítem", "Apartado", "Concepto", "Puntaje",
                "Cantidad", "Dimensión", "Valor", "Servicio"
            );
		$this->nombreTabla		= "obras";
		$this->nombreTablaAsociada	= "adicionales";
		$this->formulario		= "";
		$this->listado			= "lists/imprimirAforoList";


		$this->isAdmin = false;
	}

	function action_index() {
        $this->iniciarVistas( $this );
        $this->template = View::factory( 'templates/template' );

        $parametros = $this->request->param( Parametros::$params );
        $idExpediente = Parametros::getValueFromParam( $parametros, Parametros::$params );
		$expediente = $this->obtenerExpediente($idExpediente);
        $obrasSolicitadas = Array();
        $adicionales = Array();
        if($expediente != null && $expediente->pk() != null) {
            $obrasSolicitadas = ORM::factory($this->nombreTabla)->getObrasSolicitadas($idExpediente);
            $adicionales = ORM::factory($this->nombreTablaAsociada)->getAdicionalesSolicitados($idExpediente);
        } else {
            $idExpediente = null;
            $expediente = null;
        }

        $this->template->head = View::factory( $this->head )->bind( "visor", $this->visorHead );
        $this->template->body = View::factory( $this->listado )
            ->bind( "visor", $this->visor )
			->bind( "expediente", $expediente )
			->bind( "idexpte", $idExpediente )
            ->bind( "obrasSolicitadas", $obrasSolicitadas )
            ->bind( "adicionales", $adicionales )
			->bind( "controllerVolver", $this->urlVolver )
            ->bind( "controllerVolverLabel", $this->urlVolverLabel )
        ;
	}

    function action_new() {
        $this->iniciarVistas( $this );
        $this->template = View::factory( 'templates/template' );
        $this->auto_render = false;

        $parametros = $this->request->param( Parametros::$params );
        $idExpediente = Parametros::getValueFromParam( $parametros, Parametros::$params );
        $expediente = $this->obtenerExpediente($idExpediente);
        $obrasSolicitadas = Array();
        $adicionales = Array();
        if($expediente == null || $expediente->pk() == null) {
            $idExpediente = null;
            $expediente = null;
        } else {
            $obrasSolicitadas = ORM::factory($this->nombreTabla)->getObrasSolicitadas($idExpediente);
            $adicionales = ORM::factory($this->nombreTablaAsociada)->getAdicionalesSolicitados($idExpediente);

            $nombreArchivo = "aforo_" . ($expediente->definitivo == 1 ? "expediente" : "temporal")  . "_" . date("Y-m-d-H-i-s");
            $titulo = "aforo";

            $objPHPExcel = new PHPExcel();
            $objPHPExcel->setActiveSheetIndex(0);

            //hoja de calculo
            $this->worksheet = $objPHPExcel->getActiveSheet();
            $this->worksheet->setTitle($titulo);

            $fila = 1;
            $encabezado = $this->encabezado . " para " . ($expediente->definitivo == 1 ? "el expediente: " : "datos previos: ") . $expediente->getEncabezado();
            $this->addCelda( 0, $fila, $encabezado );

            $total = 0;
            $fila++;
            $this->agregarEncabezado($fila);
            //AFORO DE OBRAS SOLICITADAS.-
            if( $obrasSolicitadas != null ) {
                foreach( $obrasSolicitadas as $value ) {
                    $aforos = $value->obtenerAforos();

                    //obra
                    $fila++;
                    $aforo = $aforos->getObra();
                    $this->agregarAforo($fila, $aforo);
                    $total += $aforo->getValor();
                    //relevamiento
                    $relevamiento = $aforos->getRelevamientoObra();
                    if($relevamiento != null) {
                        $fila++;
                        $this->agregarRelevamiento($fila, $relevamiento);
                        $total += $relevamiento->getValor();
                    }
                    //bocas
                    $fila++;
                    $aforo = $aforos->getBoca();
                    $this->agregarAforo($fila, $aforo);
                    $total += $aforo->getValor();
                    //relevamiento
                    $relevamiento = $aforos->getRelevamientoBoca();
                    if($relevamiento != null) {
                        $fila++;
                        $this->agregarRelevamiento($fila, $relevamiento);
                        $total += $relevamiento->getValor();
                    }
                    //recinto
                    $fila++;
                    $aforo = $aforos->getRecinto();
                    $this->agregarAforo($fila, $aforo);
                    $total += $aforo->getValor();
                    //relevamiento
                    $relevamiento = $aforos->getRelevamientoRecinto();
                    if($relevamiento != null) {
                        $fila++;
                        $this->agregarRelevamiento($fila, $relevamiento);
                        $total += $relevamiento->getValor();
                    }
                }
            }
            //AFORO DE ADICIONALES DE OBRA.-
            if( $adicionales != null ) {
                foreach( $adicionales as $value ) {
                    $aforos = $value->obtenerAforos();

                    $fila++;
                    $aforo = $aforos->getPermiso();
                    $this->agregarAforo($fila, $aforo);
                    $total += $aforo->getValor();
                    $fila++;
                    $aforo = $aforos->getAdicional();
                    $this->agregarAforo($fila, $aforo);
                    $total += $aforo->getValor();
                    $fila++;
                    $aforo = $aforos->getAgua();
                    $this->agregarAforo($fila, $aforo);
                    $total += $aforo->getValor();
                    $fila++;
                    $aforo = $aforos->getCloaca();
                    $this->agregarAforo($fila, $aforo);
                    $total += $aforo->getValor();
                }
            }
            $fila++;
            $this->agregarTotal($fila, $total);

            header("Content-type: application/vnd.ms-excel; name='excel'");
            header("Content-Disposition: attachment; filename=" . $nombreArchivo . ".xlsx");
            header("Pragma: no-cache");
            header("Expires: 0");
            //Creamos el Archivo .xlsx
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
            ob_end_clean();
            $objWriter->save('php://output');
            $objPHPExcel->disconnectWorksheets();
            unset($objPHPExcel);
        }

        $this->template->head = View::factory( $this->head )->bind( "visor", $this->visorHead );
        $this->template->body = View::factory( $this->listado )
            ->bind( "visor", $this->visor )
            ->bind( "expediente", $expediente )
            ->bind( "idexpte", $idExpediente )
            ->bind( "obrasSolicitadas", $obrasSolicitadas )
            ->bind( "adicionales", $adicionales )
            ->bind( "controllerVolver", $this->urlVolver )
            ->bind( "controllerVolverLabel", $this->urlVolverLabel );
    }

    private function format($valor) {
        return NumberUtil::format($valor);
    }

    private function agregarAforo($fila, $detalleAforo) {
        $col = 0;
        $art = "";
        $inc = "";
        $it = "";
        $ap = "";
        $destino = "";
        $trabajo = "";

        if($detalleAforo->getDerecho() != null) {
            $art = $detalleAforo->getDerecho()->Art;
            $inc = $detalleAforo->getDerecho()->Inc;
            $it = $detalleAforo->getDerecho()->It;
            $ap = $detalleAforo->getDerecho()->Ap;
            $destino = $detalleAforo->getDerecho()->Destino;
        }
        if($detalleAforo->getTrabajo() != null) {
            $trabajo = $detalleAforo->getTrabajo()->nombretrabajo;
        }

        $this->addCelda( $col, $fila, $art );$col++;
        $this->addCelda( $col, $fila, $inc );$col++;
        $this->addCelda( $col, $fila, $it );$col++;
        $this->addCelda( $col, $fila, $ap );$col++;
        $this->addCelda( $col, $fila, $destino );$col++;
        $this->addCelda( $col, $fila, $detalleAforo->getPuntaje() );$col++;
        $this->addCelda( $col, $fila, $detalleAforo->getUnidad() );$col++;
        $this->addCelda( $col, $fila, $detalleAforo->getDimension() );$col++;
        $this->addCelda( $col, $fila, $this->format($detalleAforo->getValor()) );$col++;
        $this->addCelda( $col, $fila, $trabajo );
    }
    private function agregarRelevamiento($fila, $relevamiento) {
        $i = 0;
        $this->addCelda( $i, $fila, "" );$i++;
        $this->addCelda( $i, $fila, "" );$i++;
        $this->addCelda( $i, $fila, "" );$i++;
        $this->addCelda( $i, $fila, "" );$i++;
        $this->addCelda( $i, $fila, $relevamiento->getNombre() );$i++;  //relevamiento
        $this->addCelda( $i, $fila, "" );$i++;
        $this->addCelda( $i, $fila, $relevamiento->getPorcentaje() );$i++;  //porcentaje
        $this->addCelda( $i, $fila, "%" );$i++;
        $this->addCelda( $i, $fila, $this->format($relevamiento->getValor()) );$i++;
        $this->addCelda( $i, $fila, "" );
    }
    private function agregarEncabezado($fila) {
        $col = 0;
        foreach( $this->nombreColumnas as $value ) {
            $this->addCelda( $col, $fila, $value );
            $col++;
        }
    }
    private function agregarTotal($fila, $total) {
        $i = 0;
        $this->addCelda( $i, $fila, "" );$i++;
        $this->addCelda( $i, $fila, "" );$i++;
        $this->addCelda( $i, $fila, "" );$i++;
        $this->addCelda( $i, $fila, "" );$i++;
        $this->addCelda( $i, $fila, "" );$i++;
        $this->addCelda( $i, $fila, "" );$i++;
        $this->addCelda( $i, $fila, "" );$i++;
        $this->addCelda( $i, $fila, "Total $" );$i++;
        $this->addCelda( $i, $fila, $this->format($total));$i++;
        $this->addCelda( $i, $fila, "" );
    }

    private function addCelda($col, $fila, $valor) {
        $this->worksheet->setCellValueByColumnAndRow($col, $fila, utf8_encode($valor));
    }
    protected function obtenerExpediente($idExpediente) {
        return ORM::factory("expedientes")->getExpediente($idExpediente);
    }

	function action_save() {
	}

	function action_edit() {
	}

    function action_delete( $objeto = null, $listar = true, $listadoFiltrado = null ) {
	}
}
?>