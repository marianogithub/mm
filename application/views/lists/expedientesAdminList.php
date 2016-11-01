<h5><strong><?php echo $visor->getEncabezado(); ?></strong></h5>

<?php
if( $visor->getObjeto() != null && sizeof( $visor->getObjeto()->getErrores() ) > 0 ) {
	echo "<div id='error' class='alert alert-danger' >";
	echo "<ul>";
	foreach( $visor->getObjeto()->getErrores() as $error ) {
		echo "<li>$error</li>";
	}
	echo "</ul>";
	echo "</div>";
}
?>

<div class="well well-info" >
	<form action="<?php echo $visor->getUrlListado(); ?>" method="post" >
		<table>
			<colgroup>
				<col width="150px;" >
				<col>
			</colgroup>
			<tr>
				<td><label class="control-label">Tipo Expediente</label></td>
				<td>
					<select name="definitivo" class="form-control" >
						<?php
							$selected0 = strcmp("0",$definitivo) == 0 ? "selected='selected'" : "";
							$selected1 = strcmp("1",$definitivo) == 0 ? "selected='selected'" : "";
							$selected2 = strcmp("2",$definitivo) == 0 ? "selected='selected'" : "";
						?>
						<option value='2' <?php echo $selected2; ?> >Todos</option>
						<option value='1' <?php echo $selected1; ?> >Definitivos</option>
						<option value='0' <?php echo $selected0; ?> >Temporales</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><label class="control-label">Nº Expediente</label></td>
				<td><input type="text" name="expnumeroFiltro" class="form-control" value="<?php echo $expnumeroFiltro;?>" ></td>
			</tr>
			<tr>
				<td><label class="control-label">Titular</label></td>
				<td><input type="text" name="titularFiltro" class="form-control" value="<?php echo $titularFiltro;?>" ></td>
			</tr>
			<tr>
				<td><label class="control-label">Distrito del Terreno</label></td>
				<td>
					<select name="distritoFiltro" class="form-control" >
						<?php
							echo "<option value='' >Elegir Distrito</option>";
							foreach( $distritos as $distrito ) {
								$selected = strcmp($distrito, $distritoFiltro) == 0 ? "selected=selected" : "";
								echo "<option value='" . $distrito->nombredistrito . "' $selected >" . $distrito->nombredistrito . "</option>";
							}
						?>
					</select>
				</td>
			</tr>
		</table>
		<?php echo Form::submit( "filtrar", "Filtrar", array('class' => "btn btn-warning" ))?>
	</form>
</div>

<div class="text-right" style="margin:4px;">
<?php
    echo Form::button( "Nuevo", "Nuevo", array( 'onClick' => "javascript: location.href='" . $visor->getUrlNew() . "'", 'class' => "btn btn-danger"  ) );
?>
</div>
<?php 
echo "<table class='table table-condensed table-bordered table-hover'>";
echo "<thead>";
	echo "<tr class='bg-inverse'>";
		foreach( $visor->getNombreColumnas() as $key => $value ) {
			echo "<th>$value</th>";
		}
	echo "</tr>";
echo "</thead>";
	//datos de la tabla.-
    $urlObras = Kohana::$index_file . "/Obrasadmin/index/id=";
    $urlAdicionales = Kohana::$index_file . "/Adicionalesadmin/index/id=";
	$urlInspecciones = Kohana::$index_file . "/Inspeccionesadmin/index/id=";
	$urlMovimiento = Kohana::$index_file . "/Movimientoadmin/index/id=";
	$urlObservaciones = Kohana::$index_file . "/Observacionexpteadmin/index/id=";
    $urlFactibilidad = Kohana::$index_file . "/Factibilidadadmin/index/id=";
    $urlImpresionAforo = Kohana::$index_file . "/Imprimiraforoadmin/index/id=";
	echo "<tbody>";
	foreach( $visor->getListado() as $key => $value ) {
		$id = $value->pk();
        //obras
        $cantidadObras = $value->getCantidadObras();
        $obrasBadge = "<span class='badge pull-right'>$cantidadObras</span>";
        $nombreColumnaObras = $cantidadObras == 0 ? "No hay Obras Solicitadas" : "Ver Obras Solicitadas $obrasBadge";
        //adicionales
        $cantidadAdicionales = $value->getCantidadAdicionales();
        $adicionalesBadge = "<span class='badge pull-right'>$cantidadAdicionales</span>";
        $nombreColumnaAdicionales = $cantidadAdicionales == 0 ? "No hay Adicionales" : "Ver Adicionales de Obra $adicionalesBadge";
		//inspecciones
		$cantidadInspecciones = $value->getCantidadInspecciones();
		$inspeccionesBadge = "<span class='badge pull-right'>$cantidadInspecciones</span>";
		$nombreColumnaInspecciones = $cantidadInspecciones == 0 ? "No Hay Inspecciones Solicitadas" : "Ver Inspecciones Solicitadas $inspeccionesBadge";
		//movimientos
		$cantidadMovimientos = $value->getCantidadMovimientos();
		$movimientosBadge = "<span class='badge pull-right'>$cantidadMovimientos</span>";
		$nombreColumnaMovimientos = $cantidadMovimientos == 0 ? "No hay Movimientos" : "Ver Movimientos $movimientosBadge";
		//observaciones
		$cantidadObservaciones = $value->getCantidadObservaciones();
		$observacionesBadge = "<span class='badge pull-right'>$cantidadObservaciones</span>";
		$nombreColumnaObservaciones = $cantidadObservaciones == 0 ? "No hay Observaciones" : "Ver Observaciones $observacionesBadge";
		//factibilidad
		$cantidadFactibilidad = $value->getCantidadFactibilidad();
		$factibilidadBadge = "<span class='badge pull-right'>$cantidadFactibilidad</span>";
		$nombreColumnaFactibilidad = $cantidadFactibilidad == 0 ? "No hay Factibilidad" : "Ver Factibilidad $factibilidadBadge";
        //impresion de aforo
        $nombreColumnaImpresionAforo = "Imprimir Aforo";

		echo "<tr>";
		//echo "<td style='text-align: right;' >" . $value->getFechaStr() . "</td>";		//fecha.-
		echo "<td>" . $value->getExpnumeroDefinitivoStr() . "</td>";
		echo "<td>$value->titular</td>";
		echo "<td>" . html::anchor( $urlObras . $id, $nombreColumnaObras ) . "</td>";
        echo "<td>" . html::anchor( $urlAdicionales . $id, $nombreColumnaAdicionales ) . "</td>";
        echo "<td>" . html::anchor($urlInspecciones . $id, $nombreColumnaInspecciones) . "</td>";
		echo "<td>" . html::anchor( $urlMovimiento . $id, $nombreColumnaMovimientos ) . "</td>";
		echo "<td>" . html::anchor( $urlObservaciones . $id, $nombreColumnaObservaciones ) . "</td>";
        echo "<td>" . html::anchor( $urlFactibilidad . $id, $nombreColumnaFactibilidad ) . "</td>";
        echo "<td>" . html::anchor( $urlImpresionAforo . $id, $nombreColumnaImpresionAforo ) . "</td>";
        //area de edicion y eliminacion.-
        $mostrarDelete = $puedeEliminarExpediente || $value->definitivo == 0;
        echo "<td>" . $visor->getEditLink( $id ) . "</td>";
		echo "<td>" . ($mostrarDelete ? $visor->getDeleteLink( $id ) : "<br>") . "</td>";

		echo "</tr>";
	}
	echo "</tbody>";
echo "</table>";
?>
