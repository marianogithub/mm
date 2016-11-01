<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/Parametros.php';
require_once 'application/classes/controller/AppControllerTemplate.php';
require_once 'application/classes/util/PHPWord.php';
require_once 'application/classes/util/PHPWord/Writer/Word2007.php';

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


            $PHPWord = new PHPWord();

            $section = $PHPWord->createSection();

            $PHPWord->addFontStyle('mypTitulo', array('name'=>'Arial', 'size'=>16, 'color'=>'000000', 'bold'=>true, 'align'=>'center'));
            $PHPWord->addFontStyle('myp', array('name'=>'Arial', 'size'=>12, 'color'=>'000000'));

            $section->addText( 'El que suscribe solicita al jefe de Obras Privadas el permiso para realizar: ','myp');

            $obra = ORM::factory("obras");
            $obras = $obra->getObrasSolicitadas($this->expediente->pk());

            for($i=0; $i<sizeof($obras) ; $i++) {

                if(($obras[$i]->sup != null )&&($obras[$i]->sup > 0))
                {
                    $texto = $obras[$i]->tipoobra.' de  '.$obras[$i]->destinoObj->nombredestino;
                    if($obras[$i]->bocas != 0)
                    {
                        $separador = $obras[$i]->recintos != 0 ? " ," : " y";
                        $texto.= $separador . 'Electrificación ';
                    }
                    if($obras[$i]->recintos != 0)
                    {
                        $texto.=' y Sanitarios, ';
                    }
                }
                $section->addText($texto,'myp');
            }


            $section->addText(' de acuerdo a planos y documentación adjunta','myp');



            $section->addText('Ubicación de la Obra: Calle '.$this->expediente->calleppal.' Entre calle '.$this->expediente->calle1.' y Calle '.$this->expediente->calle2 .' , del Distrito '.$this->expediente->distritot,'myp');

            if(strcmp($this->expediente->poseedor, "") != 0){

                $section->addText('POSEEDOR','mypTitulo');


                $section->addText('Apellido y Nombres del '.$this->expediente->poseedor,'myp');
                $section->addText('Domicilio Real '.$this->expediente->domiciliop.''.$this->expediente->manzanaLotep.' del Distrito '.$this->expediente->distritop ,'myp');
                $section->addText('DNI'.$this->expediente->dnip,'myp');
            }
            else{
                $section->addText('PROPIETARIO','mypTitulo');

                $section->addText('Apellido y Nombres del '.$this->expediente->titular,'myp');
                $section->addText('Domicilio Real'.$this->expediente->domicilio." ".$this->expediente->manzanaLote.' del Distrito '.$this->expediente->distrito ,'myp');
                $section->addText('DNI '.$this->expediente->dni ,'myp');
            }

            $section->addText('Domicilio en Maipú ...................................................................','myp');
		}

        header("Content-type: application/msword");
        header("Content-Disposition", "attachment; filename= ". $nombreArchivo . ".doc");
        header("Pragma: no-cache");
        header("Expires: 0");
        //Creamos el Archivo
        $objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
        ob_end_clean();
        $objWriter->save('php://output');
        //$objPHPExcel->disconnectWorksheets();
        flush();




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