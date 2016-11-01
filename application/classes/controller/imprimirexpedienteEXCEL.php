<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/Parametros.php';
require_once 'application/classes/controller/AppControllerTemplate.php';
require_once 'application/classes/util/phpExcel/Classes/PHPExcel.php';
require_once 'application/classes/util/phpExcel/Classes/PHPExcel/Writer/Excel2007.php';

/**
  * 
  */
class Controller_Imprimirexpediente extends App_Controller_Template {
    private $worksheet;
    private $expediente;
	function __construct($request, $response) {
		parent::__construct($request, $response);

		$this->titulo			= "Imprimir Datos";
		$this->encabezado		= "Imprimir Datos";
		$this->nombreColumnas	= Array();
		$this->nombreTabla		= "expedientes";
		$this->formulario		= "reporte/expedienteHTML";
		$this->listado			= "";
	}

	function action_index() {
		
		$this->iniciarVistas( $this );
		$this->template = View::factory( 'templates/template' );

		$parametros = $this->request->param( Parametros::$params );
		$id = Parametros::getValueFromParam( $parametros, Parametros::$params );
		$this->expediente = ORM::factory($this->nombreTabla)->getExpediente($id);
		if($this->expediente != null) {
			$this->auto_render = false;

            $nombreArchivo = "datos_previos" . "_" . date("Y-m-d-H-i-s");

            $objPHPExcel = new PHPExcel();
            $hojaIndex = 0;

            //titular.-
            $objPHPExcel->setActiveSheetIndex($hojaIndex);
            $this->worksheet = $objPHPExcel->getActiveSheet();
			$this->titular("Titular");
            $this->worksheet = $objPHPExcel->createSheet(++$hojaIndex);
            $this->terreno("Terreno");
            $this->worksheet = $objPHPExcel->createSheet(++$hojaIndex);
            $this->profesionales("Profesionales");
            $this->worksheet = $objPHPExcel->createSheet(++$hojaIndex);
            $this->adjunta("Adjunta");

			//$leyenda = ORM::factory( "parametro" )->getLeyendaCargaDatos();
			//$firmasStr = ORM::factory( "parametro" )->getFirmasCargaDatos();
			//$firmasArray = explode(";", $firmasStr);

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
		$this->template->body = View::factory( $this->formulario )->bind( "visor", $this->visor );
	
	}

    private function titular($titulo) {
        $this->worksheet->setTitle($titulo);
        $fila = 1;
        $this->addEncabezado($fila, "Datos del Titular");$fila++;
        $this->addFila($fila, "Titular", $this->expediente->titular);$fila++;
        $this->addFila($fila, "DNI", $this->expediente->dni);$fila++;
        $this->addFila($fila, "Domicilio", $this->expediente->domicilio);$fila++;
        $this->addFila($fila, "Zona o Barrio", $this->expediente->zona);$fila++;
        $this->addFila($fila, "Casa Nro", $this->expediente->manzanaLote);$fila++;
        $this->addFila($fila, "Distrito", $this->expediente->distrito);$fila++;
        $this->addFila($fila, "Departamento", $this->expediente->departemento);$fila++;

        $fila++;

        $this->addEncabezado($fila, "Datos del Poseedor");$fila++;
        $this->addFila($fila, "Poseedor", $this->expediente->poseedor);$fila++;
        $this->addFila($fila, "DNI", $this->expediente->dnip);$fila++;
        $this->addFila($fila, "Domicilio", $this->expediente->domiciliop);$fila++;
        $this->addFila($fila, "Zona o Barrio", $this->expediente->zonap);$fila++;
        $this->addFila($fila, "Casa Nro", $this->expediente->manzanaLotep);$fila++;
        $this->addFila($fila, "Distrito", $this->expediente->distritop);$fila++;
        $this->addFila($fila, "Departamento", $this->expediente->departementop);
    }
    private function terreno($titulo) {
        $this->worksheet->setTitle($titulo);
        $fila = 1;
        $this->addEncabezado($fila, "Datos del Terreno");$fila++;
        $this->addFila($fila, "Padron Municipal", $this->expediente->padronmun);$fila++;
        $this->addFila($fila, "Nomenclatura Catastral", $this->expediente->nomcat);$fila++;
        $this->addFila($fila, "Calle Ppal Frente al Terreno", $this->expediente->calleppal);$fila++;
        $this->addFila($fila, "Calle 1: Perpendicular a la Calle Frentista", $this->expediente->calle1);$fila++;
        $this->addFila($fila, "Distancia de Calle 1 a Calle Frentista", $this->expediente->discalle1);$fila++;
        $this->addFila($fila, "Calle 2 Perpendicular a la Calle Principal", $this->expediente->calle2);$fila++;
        $this->addFila($fila, "Distancia de Calle 2 a Calle Principal", $this->expediente->discalle2);$fila++;
        $this->addFila($fila, "Zona o Barrio", $this->expediente->zonater);$fila++;
        $this->addFila($fila, "Lote", $this->expediente->lote);$fila++;
        $this->addFila($fila, "Distrito", $this->expediente->distritot);$fila++;

        $this->addFila($fila, "Superficie del Terreno en m2", $this->expediente->supterr);$fila++;
        $this->addFila($fila, "Servidumbre de paso de circulación", $this->expediente->servcirc);$fila++;
        $this->addFila($fila, "Servidumbre de Gasoducto", $this->expediente->servgas);$fila++;
        $this->addFila($fila, "Servidumbre de Electroducto", $this->expediente->servelect);$fila++;
        $this->addFila($fila, "Servidumbre de Riego", $this->expediente->servriego);$fila++;
        $this->addFila($fila, "Terreno Baldio", $this->expediente->baldio);$fila++;
        $this->addFila($fila, "Construcción a Demoler", $this->expediente->demoler);
    }
    private function profesionales($titulo) {
        $this->worksheet->setTitle($titulo);
        $fila = 1;
        $this->addEncabezado($fila, "Proyecto");$fila++;
        $this->addFila($fila, "DNI", $this->expediente->clavearq);$fila++;
        $this->addFila($fila, "Caja Provincial", $this->expediente->cajaproy);$fila++;
        $this->addFila($fila, "Certificado del Colegio", $this->expediente->certproy);$fila++;

        $fila++;
        $this->addEncabezado($fila, "Dirección Técnica");$fila++;
        $this->addFila($fila, "DNI", $this->expediente->clavedirtec);$fila++;
        $this->addFila($fila, "Caja Provincial", $this->expediente->cajadittec);$fila++;
        $this->addFila($fila, "Certificado del Colegio", $this->expediente->certdittec);$fila++;

        $fila++;
        $this->addEncabezado($fila, "Cálculo");$fila++;
        $this->addFila($fila, "DNI", $this->expediente->clavecal);$fila++;
        $this->addFila($fila, "Caja Provincial", $this->expediente->cajacal);$fila++;
        $this->addFila($fila, "Certificado del Colegio", $this->expediente->certcal);$fila++;

        $fila++;
        $this->addEncabezado($fila, "Dir. Estructura");$fila++;
        $this->addFila($fila, "DNI", $this->expediente->clavedirest);$fila++;
        $this->addFila($fila, "Caja Provincial", $this->expediente->cajadirest);$fila++;
        $this->addFila($fila, "Certificado del Colegio", $this->expediente->certdirest);$fila++;

        $fila++;
        $this->addEncabezado($fila, "Proyecto Electricidad");$fila++;
        $this->addFila($fila, "DNI", $this->expediente->claveelec);$fila++;
        $this->addFila($fila, "Caja Provincial", $this->expediente->cajaelec);$fila++;
        $this->addFila($fila, "Certificado del Colegio", $this->expediente->certelec);$fila++;

        $fila++;
        $this->addEncabezado($fila, "Dir. Tec. Electrica");$fila++;
        $this->addFila($fila, "DNI", $this->expediente->claveelecdirtec);$fila++;
        $this->addFila($fila, "Caja Provincial", $this->expediente->cajaelectdirtec);$fila++;
        $this->addFila($fila, "Certificado del Colegio", $this->expediente->certelectdirtec);$fila++;

        $fila++;
        $this->addEncabezado($fila, "Proyecto Sanitario");$fila++;
        $this->addFila($fila, "DNI", $this->expediente->clavesani);$fila++;
        $this->addFila($fila, "Caja Provincial", $this->expediente->cajasani);$fila++;
        $this->addFila($fila, "Certificado del Colegio", $this->expediente->certasani);$fila++;

        $fila++;
        $this->addEncabezado($fila, "Dir. Tec. Sanitario");$fila++;
        $this->addFila($fila, "DNI", $this->expediente->clavesanidirtec);$fila++;
        $this->addFila($fila, "Caja Provincial", $this->expediente->cajasanidirtec);$fila++;
        $this->addFila($fila, "Certificado del Colegio", $this->expediente->certsanidirtec);
    }
    private function adjunta($titulo) {
        $this->worksheet->setTitle($titulo);
        $fila = 1;
        $this->addEncabezado($fila, "Documentacion Adjunta");$fila++;
        $this->addFila($fila, "Planos Arquitectura", $this->expediente->planosarq);$fila++;
        $this->addFila($fila, "Planillas de Vent. Iluminacion", $this->expediente->ventilum);$fila++;
        $this->addFila($fila, "Planos Estructura", $this->expediente->planoestruc);$fila++;
        $this->addFila($fila, "Memorias de Calculos", $this->expediente->memocal);$fila++;
        $this->addFila($fila, "Planos Electricidad", $this->expediente->planoselec);$fila++;
        $this->addFila($fila, "Planos Sanitario", $this->expediente->planosanit);$fila++;
        $this->addFila($fila, "Certificado de Linea", $this->expediente->certflinea);$fila++;
        $this->addFila($fila, "Fotocopia de Escritura", $this->expediente->fotescritura);$fila++;
        $this->addFila($fila, "Fotocopia Certificado Factibilidad", $this->expediente->certfactibilidad);$fila++;
        $this->addFila($fila, "Planos de Mensura", $this->expediente->planosmensura);
    }
    private function addEncabezado($fila, $encabezado) {
        $this->worksheet->setCellValueByColumnAndRow(0, $fila, utf8_encode($encabezado));
    }
    private function addFila($fila, $label, $valor) {
        $this->worksheet->setCellValueByColumnAndRow(0, $fila, utf8_encode($label));
        $this->worksheet->setCellValueByColumnAndRow(1, $fila, utf8_encode($valor));
    }
	function action_save() {
		$this->action_index();
	}

	function action_edit() {
		$this->action_index();
	}
	function action_new() {
		$this->action_index();
	}
}
?>