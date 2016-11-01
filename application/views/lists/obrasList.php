<h5><strong>
	<?php
		if($expediente != null) {
			echo $visor->getEncabezado() . " para ";
			echo $expediente->definitivo == 1 ? "el expediente: " : "datos previos: ";
			echo $expediente->getEncabezado();
		} else {
			echo "No existe el expediente elegido";
		}
	?>
</strong></h5>

<div class="text-right" style="margin:4px;">
<?php
echo Form::button( "volver", $controllerVolverLabel,
		array( 'onClick' => "javascript: location.href='" . Kohana::$base_url . Kohana::$index_file . "/$controllerVolver/'", 'class' => "btn"  ) );
echo Form::button( "Nuevo", "Nuevo", array( 'onClick' => "javascript: location.href='".$visor->getUrlNew()."/id=$idexpte'", 'class' => "btn btn-danger"  ) );
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
        $aforos = $value->obtenerAforos();
        $aforosStr =   "Aforo: " . $aforos->getValorObra()."<br>" .
                       "Aforo de Bocas: " . $aforos->getValorBoca()."<br>" .
                       "Aforo de Recintos: " . $aforos->getValorRecinto();
        $aforosPopover = "<span class='glyphicon glyphicon-search pull-right ayuda' title='Aforos' " .
            "data-toggle='popover' data-placement='right' data-html='true' data-content='$aforosStr' > " .
            "</span>";
		$id = $value->pk();
		echo "<tr>";
		echo "<td>" . $value->nivelObj->nivel. "</td>";
		echo "<td>$value->sup/$value->supaleros</td>";
		echo "<td>$value->bocas</td>";
		echo "<td>$value->potencia</td>";
		echo "<td>$value->recintos</td>";
		echo "<td>$value->tipoobra</td>";
		echo "<td>".$value->destinoObj->nombredestino."</td>";
		echo "<td>".$value->trabajoObj->nombretrabajo."</td>";
		echo "<td>$value->puntaje</td>";
		echo "<td>$value->estadoobra</td>";
		echo "<td>$value->nrorecibo</td>";
        echo "<td style='text-align: right;' >" . $value->getFechaPagoStr() . "</td>";
        echo "<td>" . $aforos->getTotal() . $aforosPopover . "</td>";

		echo "<td>" . $visor->getEditLink( $id ) . "</td>";
		echo "<td>" . $visor->getDeleteLink( $id ) . "</td>";
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