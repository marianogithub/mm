<h5><strong><?php echo $visor->getEncabezado(); ?></strong></h5>

<div class="text-right" style="margin:4px;">
    <?php
    echo Form::button( "Nuevo", "Nuevo", array( 'onClick' => "javascript: location.href='" . $visor->getUrlNew() . "'", 'class' => "btn btn-danger"  ) );
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

//datos de la tabla.-
foreach( $visor->getListado() as $key => $value ) {
    $id = $value->pk();
    $cantidadUsos = $value->getCantidadUsos();
    $msjCantidad = null;
    if($cantidadUsos > 0) {
        $msjCantidad = "Usada en $cantidadUsos " . ($cantidadUsos == 1 ? "N�mero" : "N�meros");
    }

    echo "<tr>";
    echo "<td>$value->nombre</td>";
    echo "<td>" . $visor->getEditLink( $id ) . "</td>";
    echo "<td>" . ($cantidadUsos > 0 ? $msjCantidad : $visor->getDeleteLink( $id )) . "</td>";
    echo "</tr>";
}
echo "</table>";
?>

