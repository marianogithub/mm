<h5><strong>
	<?php
		if($expediente != null) {
			echo $visor->getEncabezado() . " para el expediente: " . $expediente->getEncabezado();
		} else {
			echo "No existe el expediente elegido";
		}
	?>
</strong></h5>

<div class="pull-right" style="margin:4px;">
<?php
echo Form::button( "volver", "Volver a Expedientes",
		array( 'onClick' => "javascript: location.href='" . Kohana::$base_url . Kohana::$index_file . "/$controllerVolver/'", 'class' => "btn"  ) );
?>
</div>


<?php
echo "<table class='table table-condensed table-bordered table-hover'>";
echo "<thead><tr class='bg-inverse'>";

for ($i = 0; $i < sizeof($visor->getNombreColumnas()); $i++) {
	$value = $visor->getNombreColumnas()[$i];
	$ayuda = $ayudaColumnas[$i];
	echo "<th>$value";
	echo $ayuda != null ?
		"<span class='glyphicon glyphicon-info-sign pull-right ayuda' title='$value' " .
			"data-toggle='popover' data-placement='center' data-content='$ayuda' > " .
		"</span>" :
		"";
	echo "</th>";
}
echo "</tr></thead>";

//datos de la tabla.-
if( $visor->getListado() != null ) {
	foreach( $visor->getListado() as $key => $value ) {
		$id = $value->pk();
		echo "<tr>";
 		echo "<td>$value->usuario</td>";
		echo "<td>$value->origen</td>";
		echo "<td style='text-align: right;' >" . $value->getFechaIngresoStr() . "</td>";
		echo "<td style='text-align: right;' >" . $value->getFechaSalidaStr() . "</td>";
		echo "<td>$value->destino</td>";
		echo "<td style='text-align: right;' >" . $value->getFechaEgresoStr() . "</td>";
		echo "<td>$value->resultado</td>";
		echo "<td>$value->fojas</td>";
		echo "<td>$value->observaciones</td>";

		//echo "<td>" . $visor->getEditLink( $id ) . "</td>";
        //echo "<td>" . $visor->getDeleteLink( $id ) . "</td>";
		echo "</tr>";
	}
}
echo "</table>";
?>
<script>
$(document).ready(function() {
	$(".ayuda").popover();
});
</script>