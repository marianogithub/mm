<h5><strong><?php echo $visor->getEncabezado(); ?></strong></h5>

<div class="text-right" style="margin:4px;">
<?php
echo Form::button( "volver", "Volver",
    array( 'onClick' => "javascript: location.href='" . Kohana::$base_url . Kohana::$index_file . "/Distritos/'", 'class' => "btn"  ) );
echo Form::button( "Nuevo", "Nuevo", array( 'onClick' => "javascript: location.href='".$visor->getUrlNew()."/id=$iddistrito'", 'class' => "btn btn-danger"  ) );
?>
</div>

<?php 
//encabezado de la tabla.-
echo "<table class='table table-condensed table-bordered table-hover' >";
echo "<thead><tr class='bg-inverse'>";
	foreach( $visor->getNombreColumnas() as $key => $value ) {
		echo "<th>$value</th>";
	}
	echo "</tr></thead>";

    $urlCalle = Kohana::$index_file . "/Calle/index/id=";
    //datos de la tabla.-
    foreach( $visor->getListado() as $key => $value ) {
        $id = $value->pk();
        $cantidadCalles = $value->getCantidadCalles();
        $callesBadge = "<span class='badge pull-right'>$cantidadCalles</span>";
        $nombreColumnaCalle = $cantidadCalles == 0 ? "No hay Calles" : "Ver Calles $callesBadge";
        echo "<tr>";
        echo "<td>$value->nombre</td>";
        echo "<td>" . html::anchor( $urlCalle . $id, $nombreColumnaCalle ) . "</td>";
        echo "<td>" . $visor->getEditLink( $id ) . "</td>";
        echo "<td>" . $visor->getDeleteLink( $id ) . "</td>";
        echo "</tr>";
    }
echo "</table>";
?>