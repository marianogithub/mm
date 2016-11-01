<h5><strong><?php echo $visor->getEncabezado(); ?></strong></h5>

<div class="text-right" style="margin:4px;">
    <?php echo $visor->getNewButton(); ?>
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
$urlUsos = Kohana::$index_file . "/Zonascargadasuso/index/id=";
foreach( $visor->getListado() as $key => $value ) {
    $id = $value->pk();
    echo "<tr>";

    //usos
    $cantidadUsos = $value->getCantidadUsos();
    $usosBadge = "<span class='badge pull-right'>$cantidadUsos</span>";
    $nombreColumnaUsos = $cantidadUsos == 0 ? "No hay Usos" : "Ver Usos $usosBadge";

    echo "<td>" . $value->numerozona->getNumeroZonaStr() . "</td>";
    echo "<td>" . html::anchor( $urlUsos . $id, $nombreColumnaUsos ) . "</td>";
    echo "<td>" . $value->lote->nombre . "</td>";
    echo "<td>" . $value->altura->nombre . "</td>";
    echo "<td>" . $value->ancho->nombre . "</td>";
    echo "<td>" . $value->retiro->nombre . "</td>";
    echo "<td>" . $value->vivienda->nombre . "</td>";
    echo "<td>" . $value->galpon->nombre . "</td>";
    echo "<td>" . $value->fos->nombre . "</td>";
    echo "<td>" . $value->fot->nombre . "</td>";
    echo "<td>" . $value->cumplida->nombre . "</td>";
    echo "<td>" . $value->ensanche->nombre . "</td>";
    echo "<td>" . $value->afectacionlimite->nombre . "</td>";
    echo "<td>" . $value->actividadcompleja->nombre . "</td>";
    echo "<td>" . $value->iniciarexpediente->nombre . "</td>";
    echo "<td>" . $value->fuerzamotriz->nombre . "</td>";
    echo "<td>" . $value->estacionamiento->nombre . "</td>";
    echo "<td>" . $value->espacioocupar->nombre . "</td>";

    echo "<td>" . $visor->getEditLink( $id ) . "</td>";
    echo "<td>" . $visor->getDeleteLink( $id ) . "</td>";
    echo "</tr>";
}
echo "</table>";
?>

