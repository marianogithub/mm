<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/Parametros.php';
require_once 'application/classes/controller/AppControllerTemplate.php';
require_once 'application/classes/PDF/fpdf.php';

/**
  * 
  */
class Controller_ImprimirexpedienteOLD extends App_Controller_Template {
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
		$expediente = ORM::factory($this->nombreTabla)->getExpediente($id);
		if($expediente != null) {
			//$this->visor->setObjeto( $expediente );
			$this->auto_render = false;
			$pdf=new FPDF('P','mm','A4');
			$pdf->AddPage();
			$pdf->Image( "application/classes/PDF/municipalidad_de_maipu.png", 20, 20, 40, 20, 'PNG');
			$pdf->SetFont('Arial','B',16);
			$pdf->SetXY(60, 25);
			$pdf->MultiCell(65, 5, utf8_decode('Expediente Nro '.$expediente->getEncabezado()), 0, 'C');
			
			//Fecha
			$pdf->SetFont('Arial','', 12);
			$pdf->SetXY(120,40);
			$pdf->Cell(15, 8, 'Impreso el: '.date("d/m/Y") , 0, 'L');
			$pdf->Ln(10);
			
			$pdf->SetXY(25, 45);
			$pdf->SetFont('Arial','U',12);
			$pdf->Cell(40,10,'Datos Titular:',0,0,'L',0);
			$pdf->SetXY(25, 50);
			$pdf->SetFont('Arial','',11);
			$pdf->Cell(15,10,'Titular:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->titular ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 55);
			$pdf->Cell(10,10,'DNI:',0,0,'L',0);
			$pdf->Cell(20,10, $expediente->dni ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 60);
			$pdf->Cell(20,10,'Domicilio:',0,0,'L',0); 
			$pdf->Cell(200,10, $expediente->domicilio ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 65);
			$pdf->Cell(30,10,'Zona o Barrio:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->zona ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 70);
			$pdf->Cell(20,10,'Casa Nro:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->manzanaLote ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 75);
			$pdf->Cell(20,10,'Distrito:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->distrito ,0,0,'L',0);
			$pdf->Ln(10); 
			$pdf->SetXY(25, 80);
			$pdf->Cell(30,10,'Departamento:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->departemento ,0,0,'L',0);
			$pdf->Ln(20);   
			
			$pdf->SetXY(25, 85);
			$pdf->SetFont('Arial','U',12);
			$pdf->Cell(40,10,'Datos del Poseedor:',0,0,'L',0);
			$pdf->SetXY(25, 90);
			$pdf->SetFont('Arial','',11);
			$pdf->Cell(25,10,'Poseedor:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->poseedor ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 95);
			$pdf->Cell(10,10,'DNI:',0,0,'L',0);
			$pdf->Cell(20,10, $expediente->dnip ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 100);
			$pdf->Cell(20,10,'Domicilio:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->domiciliop ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 105);
			$pdf->Cell(30,10,'Zona o Barrio:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->zonap ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 110);
			$pdf->Cell(20,10,'Casa Nro:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->manzanaLotep ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 115);
			$pdf->Cell(20,10,'Distrito:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->distritop ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 120);
			$pdf->Cell(30,10,'Departamento:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->departementop ,0,0,'L',0);
			$pdf->Ln(20);
			
			$pdf->SetXY(25, 125);
			$pdf->SetFont('Arial','U',12);
			$pdf->Cell(40,10,'Datos del Terreno:',0,0,'L',0);
			$pdf->SetXY(25, 130);
			$pdf->SetFont('Arial','',11);
			$pdf->Cell(40,10,'Padron Municipal:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->padronmun ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 135);
			$pdf->Cell(50,10,'Nomenclatura Catastral:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->nomcat ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 140);
			$pdf->Cell(55,10,'Calle Ppal Frente al Terreno:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->calleppal ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 145);
			$pdf->Cell(70,10,'Calle 1: Perpendicular a la Calle Frentista:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->calle1 ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 150);
			$pdf->Cell(70,10,'Distancia de Calle 1 a Calle Frentista:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->discalle1 ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 155);
			$pdf->Cell(70,10,'Calle 2 Perpendicular a la Calle Principal:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->calle2 ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 160);
			$pdf->Cell(30,10,'Zona o Barrio:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->zonater ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 165);
			$pdf->Cell(15,10,'Lote:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->lote ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 170);
			$pdf->Cell(20,10,'Distrito:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->distritot ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 175);
			$pdf->Cell(60,10,'Superficie del Terreno en m2:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->supterr ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 180);
			$pdf->Cell(70,10,'Servidumbre de paso de circulación 1:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->servcirc ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 185);
			$pdf->Cell(50,10,'Servidumbre de Gasoducto:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->servgas ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 190);
			$pdf->Cell(60,10,'Servidumbre de Electroducto:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->servelect ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 195);
			$pdf->Cell(50,10,'Servidumbre de Riego:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->servriego ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 200);
			$pdf->Cell(30,10,'Terreno Baldio:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->baldio ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 205);
			$pdf->Cell(50,10,'Construcción a Demoler:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->demoler ,0,0,'L',0);
			$pdf->Ln(20);
			
			$pdf->SetXY(25, 210);
			$pdf->SetFont('Arial','U',12);
			$pdf->Cell(40,10,'Proyecto:',0,0,'L',0);
			$pdf->SetXY(25, 215);
			$pdf->SetFont('Arial','',11);
			$pdf->Cell(10,10,'DNI:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->clavearq ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 220);
			$pdf->Cell(30,10,'Caja Provincial:',0,0,'L',0);
			$pdf->Cell(20,10, $expediente->cajaproy ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 225);
			$pdf->Cell(45,10,'Certificado del Colegio:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->certproy ,0,0,'L',0);
			$pdf->Ln(20);
			
			$pdf->SetXY(25, 230);
			$pdf->SetFont('Arial','U',12);
			$pdf->Cell(30,10,'Dirección Tecnica:',0,0,'L',0);
			$pdf->SetXY(25, 235);
			$pdf->SetFont('Arial','',11);
			$pdf->Cell(10,10,'DNI:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->clavedirtec ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 240);
			$pdf->Cell(30,10,'Caja Provincial:',0,0,'L',0);
			$pdf->Cell(20,10, $expediente->cajadittec ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 245);
			$pdf->Cell(40,10,'Certificado del Colegio:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->certdittec ,0,0,'L',0);
			$pdf->Ln(20);
			
			///Otra Hoja
			$pdf->AddPage();
			$pdf->Image( "application/classes/PDF/municipalidad_de_maipu.png", 20, 20, 40, 20, 'PNG');
			$pdf->SetFont('Arial','B',16);
			$pdf->SetXY(60, 25);
			$pdf->MultiCell(65, 5, utf8_decode('Expediente Nro '.$expediente->expnumero), 0, 'C');
				
			//Fecha
			$pdf->SetFont('Arial','', 12);
			$pdf->SetXY(120,40);
			$pdf->Cell(15, 8, 'Impreso el: '.date("d/m/Y") , 0, 'L');
			$pdf->Ln(10);
			
			$pdf->SetXY(25, 45);
			$pdf->SetFont('Arial','U',12);
			$pdf->Cell(40,10,'Calculo:',0,0,'L',0);
			$pdf->SetXY(25, 50);
			$pdf->SetFont('Arial','',11);
			$pdf->Cell(10,10,'DNI:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->clavecal ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 55);
			$pdf->Cell(20,10,'Caja Provincial:',0,0,'L',0);
			$pdf->Cell(20,10, $expediente->cajacal ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 60);
			$pdf->Cell(50,10,'Certificado del Colegio:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->certcal ,0,0,'L',0);
			$pdf->Ln(20);
			
			$pdf->SetXY(25, 65);
			$pdf->SetFont('Arial','U',12);
			$pdf->Cell(30,10,'Dir. Estructura:',0,0,'L',0);
			$pdf->SetXY(25, 70);
			$pdf->SetFont('Arial','',11);
			$pdf->Cell(10,10,'DNI:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->cajaelectdirtec ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 75);
			$pdf->Cell(30,10,'Caja Provincial:',0,0,'L',0);
			$pdf->Cell(20,10, $expediente->cajaelectdirtec ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 80);
			$pdf->Cell(50,10,'Certificado del Colegio:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->certdirest ,0,0,'L',0);
			$pdf->Ln(20);
			
			$pdf->SetXY(25, 85);
			$pdf->SetFont('Arial','U',12);
			$pdf->Cell(40,10,'Proyecto Electricidad:',0,0,'L',0);
			$pdf->SetXY(25, 90);
			$pdf->SetFont('Arial','',11);
			$pdf->Cell(10,10,'DNI:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->claveelec ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 95);
			$pdf->Cell(30,10,'Caja Provincial:',0,0,'L',0);
			$pdf->Cell(20,10, $expediente->cajaelec ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 100);
			$pdf->Cell(50,10,'Certificado del Colegio:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->certelec ,0,0,'L',0);
			$pdf->Ln(20);
			
			$pdf->SetXY(25, 105);
			$pdf->SetFont('Arial','U',12);
			$pdf->Cell(40,10,'Dir. Tec. Electrica:',0,0,'L',0);
			$pdf->SetXY(25, 110);
			$pdf->SetFont('Arial','',11);
			$pdf->Cell(10,10,'DNI:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->claveelecdirtec ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 115);
			$pdf->Cell(30,10,'Caja Provincial:',0,0,'L',0);
			$pdf->Cell(20,10, $expediente->cajaelectdirtec ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 120);
			$pdf->Cell(50,10,'Certificado del Colegio:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->certelectdirtec ,0,0,'L',0);
			$pdf->Ln(20);
			
			$pdf->SetXY(25, 125);
			$pdf->SetFont('Arial','U',12);
			$pdf->Cell(40,10,'Proyecto Sanitario:',0,0,'L',0);
			$pdf->SetXY(25, 130);
			$pdf->SetFont('Arial','',11);
			$pdf->Cell(10,10,'DNI:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->clavesani ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 135);
			$pdf->Cell(30,10,'Caja Provincial:',0,0,'L',0);
			$pdf->Cell(20,10, $expediente->cajasani ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 140);
			$pdf->Cell(50,10,'Certificado del Colegio:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->certasani ,0,0,'L',0);
			$pdf->Ln(20);
			
			$pdf->SetXY(25, 145);
			$pdf->SetFont('Arial','U',12);
			$pdf->Cell(40,10,'Dir. Tec. Sanitario:',0,0,'L',0);
			$pdf->SetXY(25, 150);
			$pdf->SetFont('Arial','',11);
			$pdf->Cell(10,10,'DNI:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->clavesanidirtec ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 155);
			$pdf->Cell(30,10,'Caja Provincial:',0,0,'L',0);
			$pdf->Cell(20,10, $expediente->cajasanidirtec ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 160);
			$pdf->Cell(50,10,'Certificado del Colegio:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->certsanidirtec ,0,0,'L',0);
			$pdf->Ln(20);
			
			
			$pdf->SetXY(25, 165);
			$pdf->SetFont('Arial','U',12);
			$pdf->Cell(40,10,'Documentacion Adjunta:',0,0,'L',0);
			$pdf->SetXY(25, 170);
			$pdf->SetFont('Arial','',11);
			$pdf->Cell(40,10,'Planos Arquitectura:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->planosarq ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 175);
			$pdf->Cell(60,10,'Planillas de Vent. Iluminacion:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->ventilum ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 180);
			$pdf->Cell(40,10,'Planos Estructura:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->planoestruc ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 185);
			$pdf->Cell(40,10,'Memorias de Calculos:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->memocal ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 190);
			$pdf->Cell(40,10,'Planos Electricidad:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->planoselec ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 195);
			$pdf->Cell(40,10,'Planos Sanitario:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->planosanit ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 200);
			$pdf->Cell(40,10,'Certificado de Linea:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->certflinea ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 205);
			$pdf->Cell(50,10,'Fotocopia de Escritura:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->fotescritura ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 210);
			$pdf->Cell(60,10,'Fotocopia Certificado Factibilidad:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->certfactibilidad ,0,0,'L',0);
			$pdf->Ln(10);
			$pdf->SetXY(25, 215);
			$pdf->Cell(40,10,'Planos de Mensura:',0,0,'L',0);
			$pdf->Cell(200,10, $expediente->planosmensura ,0,0,'L',0);
			$pdf->Ln(20);

			
			$leyenda = ORM::factory( "parametro" )->getLeyendaCargaDatos();
			$firmasStr = ORM::factory( "parametro" )->getFirmasCargaDatos();
			$firmasArray = explode(";", $firmasStr);

			ob_end_clean(); 
			$pdf->Output('archivo.pdf','D'); 
			
		}
		
		$this->template->head = View::factory( $this->head )->bind( "visor", $this->visorHead );
		$this->template->body = View::factory( $this->formulario )->bind( "visor", $this->visor );
	
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