<h5>
    <strong>
        <?php
        if($expediente != null) {
            echo $visor->getEncabezado() . " para ";
            echo $expediente->definitivo == 1 ? "el expediente: " : "datos previos: ";
            echo $expediente->getEncabezado();
        } else {
            echo "No existe el expediente elegido";
        }
        ?>
    </strong>
</h5>

<div class="text-right" style="margin:4px;">
<?php
echo Form::button( "volver", $controllerVolverLabel,
    array( 'onClick' => "javascript: location.href='" . Kohana::$base_url . Kohana::$index_file . "/$controllerVolver/'", 'class' => "btn"  ) );
?>
</div>

<form id="idForm" action="<?php echo $visor->getUrlListado() . "/id=" . $expediente->pk(); ?>" method="post" >
<table>
    <colgroup>
        <col width="150px">
        <col >
    </colgroup>

    <tr>
        <td><label class="control-label">Zona</label></td>
        <td>
            <select name="idnumerozona" class="form-control recargar" >
                <?php
                foreach($numerozonas as $numerozona) {
                    $selected = "";
                    if($idnumerozona == $numerozona->idnumerozona ) {
                        $selected = "selected=selected";
                    }
                    echo "<option value='" . $numerozona->idnumerozona . "' $selected >" . $numerozona->getNumeroZonaStr() . "</option>";
                }
                ?>
            </select>
        </td>
    </tr>
</table>
</form>
<br>
<?php
if(sizeof($visor->getListado()) > 0) {
    //encabezado de la tabla.-
    echo "<table class='table table-condensed table-bordered table-hover' >";
    echo "<thead>";
    echo "<tr class='bg-inverse'><th colspan='".(sizeof($visor->getNombreColumnas()) + 1)."' class='text-center' >Factibilidad</th></tr>";
    echo "<tr class='bg-inverse'>";
    foreach( $visor->getNombreColumnas() as $value ) {
        echo "<th>$value</th>";
    }
    echo "<th>Eliminar</th>";
    echo "</tr>";
    echo "</thead>";

    //datos de la tabla.-
    foreach( $visor->getListado() as $value ) {
        $id = $value->pk();
        echo "<tr>";
        echo "<td>" . $value->uso->nombre . "</td>";
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
        echo "<td>" . $visor->getDeleteLink( $id ) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

if(sizeof($visor->getListado()) == 0) {
    //encabezado de la tabla de zonas cargadas de uso.-
    echo "<table class='table table-condensed table-bordered table-hover' >";
    echo "<thead>";
    echo "<tr class='bg-inverse'>";
    echo "<th>Uso</th>";
    echo "<th>Agregar</th>";
    echo "</tr>";
    echo "</thead>";

    //datos de la tabla.-
    foreach( $zonasCargadasUso as $value ) {
        $id = $value->pk();
        echo "<tr>";
        echo "<td>" . $value->uso->nombre . "</td>";
        echo "<td><a href='" . $visor->getUrlSave() . "/id=" . $expediente->pk() . "&idzonascargadasuso=" . $id . "' >Agregar</a></td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>
<script>
    $( document ).ready(function() {
        $( ".recargar" ).change(function() {
            $( "#idForm" ).submit();
        });
    });
</script>