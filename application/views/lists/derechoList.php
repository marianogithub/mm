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
    echo "<tr>";
    echo "<td>$value->Art</td>";
    echo "<td>$value->Inc</td>";
    echo "<td>$value->It</td>";
    echo "<td>$value->Ap</td>";
    echo "<td>$value->Destino</td>";
    echo "<td>$value->CC</td>";
    echo "<td>$value->puntajeinferior</td>";
    echo "<td>$value->puntajesuperior</td>";
    echo "<td>" . $visor->getEditLink( $id ) . "</td>";
    echo "<td>" . $visor->getDeleteLink( $id ) . "</td>";
    echo "</tr>";
}
echo "</table>";
?>

