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
echo Form::button( "Nuevo", "Nuevo", array( 'onClick' => "javascript: location.href='".$visor->getUrlNew()."/id=$idexpte'", 'class' => "btn btn-danger"  ) );

echo Form::button( "Exportar a Excel", "Exportar a Excel", array( 'onClick' => "javascript: location.href='".$visor->getUrlNew()."/id=$idexpte'", 'class' => "btn btn-primary"  ) );
?>
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

		echo "<td>" . $visor->getEditLink( $id ) . "</td>";
        echo "<td>" . $visor->getDeleteLink( $id ) . "</td>";
		echo "</tr>";
	}
}
echo "</table>";
?>