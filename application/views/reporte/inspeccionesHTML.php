<h5><strong><?php echo $visor->getEncabezado(); ?></strong></h5>

<div class="well well-info" >
	<form action="<?php echo $visor->getUrlListado(); ?>" method="post" >
		<table>
			<colgroup>
				<col width="150px;" >
				<col>
			</colgroup>
			<tr>
				<td><label class="control-label">Fecha Inicial</label></td>
				<td>
					<input type="text" readonly="readonly" name="fechaInicial" class="form-control"
						   value="<?php echo $fechaInicial;?>" id="fechaInicial" >
				</td>
				<td>
					<a href="#" onclick="limpiarFecha('fechaInicial');">Borrar Fecha</a>
				</td>
			</tr>
			<tr>
				<td><label class="control-label">Fecha Final</label></td>
				<td>
					<input type="text" readonly="readonly" name="fechaFinal" class="form-control"
						   value="<?php echo $fechaFinal;?>" id="fechaFinal" >
				</td>
				<td>
					<a href="#" onclick="limpiarFecha('fechaFinal');">Borrar Fecha</a>
				</td>
			</tr>
			<tr>
				<td><label class="control-label">Distrito del Terreno</label></td>
				<td>
					<select name="distritoFiltro" class="form-control" >
						<?php
						echo "<option value='' >Elegir Distrito</option>";
						foreach( $distritos as $distrito ) {
							$selected = strcmp($distrito->nombredistrito, $distritoFiltro) == 0 ? "selected=selected" : "";
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

<?php
echo "<table class='table table-condensed table-bordered table-hover'>";

echo "<thead><tr class='bg-inverse'>";
foreach( $visor->getNombreColumnas() as $value ) {
	echo "<th>$value</th>";
}
echo "</tr></thead>";

//datos de la tabla.-
if( $visor->getListado() != null ) {
	foreach( $visor->getListado() as $key => $value ) {
		$id = $value->pk();
		echo "<tr>";
		echo "<td style='text-align: right;' >" . $value->getFechainspeccionStr() . "</td>";		//fecha solicitud
		echo "<td style='text-align: right;' > FECHA EFECTIVA </td>";	//fecha inspeccion
		echo "<td>" . $value->gremioobservacion->nombre. "</td>";
		echo "<td>" . $value->inspeccionobra->concepto. "</td>";
		echo "<td>" . $value->nivel->nivel. "</td>";
 		echo "<td>" . $value->getCartelStr() . "</td>";
		echo "<td>$value->sector</td>";
        echo "<td>$value->comentarios</td>";
        echo "<td>$value->total</td>";
        echo "<td>$value->estado</td>";
        echo "<td>$value->inspector</td>";
		echo "</tr>";
	}
}
echo "</table>";
?>

<script>
	var dateFormat = "<?php echo DateUtil::getFormatoDatePicker(); ?>";
	var formatos = {
		dateFormat: dateFormat,
		beforeShowDay: $.datepicker.noWeekends
	};

	$( document ).ready(function() {
		$( "#fechaInicial" ).datepicker(formatos);
		$( "#fechaInicial" ).datepicker( "option", $.datepicker.regional["es"] );

		$( "#fechaFinal" ).datepicker(formatos);
		$( "#fechaFinal" ).datepicker( "option", $.datepicker.regional["es"] );
	});

	function limpiarFecha(datepicker) {
		$( "#" + datepicker ).val("");
	}
</script>
