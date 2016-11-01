<?php
function dibujarCombo( $label, $name, $listado, $valorActual, $campoId, $campoValor) {
    echo "<tr>";
    echo "<td><label class='control-label' >$label</label></td>";
    echo "<td>";
    echo "<select name='$name' class='form-control' >";
    foreach( $listado as $item ) {
        $selected = "";
        $itemId = "" . $item->$campoId . "";
        $itemValor = $item->$campoValor;

        if( $valorActual != null && (strcmp($valorActual, $itemId) == 0) ) {
            $selected = "selected=selected";
        }
        echo "<option value='$itemId' $selected >$itemValor</option>";
    }
    echo "</select>";
    echo "</td>";
    echo "</tr>";
}
?>

<form action="<?php echo $visor->getUrlSave(); ?>" method="post" >

    <?php
    echo Form::hidden( "id", $visor->getObjeto()->pk());

    if( sizeof( $visor->getObjeto()->getErrores() ) > 0 ) {
        echo "<div id='error'>";
        echo "<ul>";
        foreach( $visor->getObjeto()->getErrores() as $error ) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
        echo "</div>";
    }
    ?>
    <h5><strong><?php echo $visor->getEncabezado(); ?></strong></h5>
    <table>
        <colgroup>
            <col width="150px">
            <col >
        </colgroup>

        <tr>
            <td><label class="control-label">Zona</label></td>
            <td>
                <select name="idnumerozona" class="form-control" >
                    <?php
                    foreach($numerozonas as $numerozona) {
                        $selected = "";
                        if($visor->getObjeto()->idnumerozona != null && $visor->getObjeto()->idnumerozona == $numerozona->idnumerozona ) {
                            $selected = "selected=selected";
                        }
                        echo "<option value='" . $numerozona->idnumerozona . "' $selected >" . $numerozona->getNumeroZonaStr() . "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <?php

        dibujarCombo( "Lote", "idlote", $lotes, $visor->getObjeto()->idlote, "idlote", "nombre");
        dibujarCombo( "Altura", "idaltura", $alturas, $visor->getObjeto()->idaltura, "idaltura", "nombre");
        dibujarCombo( "Ancho", "idancho", $anchos, $visor->getObjeto()->idancho, "idancho", "nombre");
        dibujarCombo( "Retiro", "idretiro", $retiros, $visor->getObjeto()->idretiro, "idretiro", "nombre");
        dibujarCombo( "Vivienda", "idvivienda", $viviendas, $visor->getObjeto()->idvivienda, "idvivienda", "nombre");
        dibujarCombo( "Galpón", "idgalpon", $galpones, $visor->getObjeto()->idgalpon, "idgalpon", "nombre");
        dibujarCombo( "FOS", "idfos", $fos, $visor->getObjeto()->idfos, "idfos", "nombre");
        dibujarCombo( "FOT", "idfot", $fot, $visor->getObjeto()->idfot, "idfot", "nombre");
        dibujarCombo( "Cumplir Ordenanzas", "idcumplirordenanza", $cumplirordenanzas, $visor->getObjeto()->idcumplirordenanza, "idcumplirordenanza", "nombre");
        dibujarCombo( "Afectación Ensanche o Apertura", "idensancheapertura", $ensancheaperturas, $visor->getObjeto()->idensancheapertura, "idensancheapertura", "nombre");
        dibujarCombo( "Afectación de Limites", "idafectacionlimite", $limites, $visor->getObjeto()->idafectacionlimite, "idafectacionlimite", "nombre");
        dibujarCombo( "Actividades Complejas", "idactividadcompleja", $actividadcomplejas, $visor->getObjeto()->idactividadcompleja, "idactividadcompleja", "nombre");
        dibujarCombo( "Iniciar Expediente", "idiniciarexpediente", $iniciarexpedientes, $visor->getObjeto()->idiniciarexpediente, "idiniciarexpediente", "nombre");
        dibujarCombo( "Fuerza Motriz", "idfuerzamotriz", $fuerzamotrices, $visor->getObjeto()->idfuerzamotriz, "idfuerzamotriz", "nombre");
        dibujarCombo( "Estacionamiento", "idestacionamiento", $estacionamientos, $visor->getObjeto()->idestacionamiento, "idestacionamiento", "nombre");
        dibujarCombo( "Espacio a Ocupar", "idespacioocupar", $espacioocupados, $visor->getObjeto()->idespacioocupar, "idespacioocupar", "nombre");
        ?>

    </table>
    <div class="panel-footer well well-sm">
        <?php echo Form::submit( "Confirmar", "Confirmar", array('class' => "btn btn-primary" ))?>
        <?php echo Form::button( "Cancelar", "Cancelar", array( 'type' => 'button', 'onClick' => "javascript: location.href='" . $visor->getUrlListado() . "'" , 'class' => "btn") )?>
    </div>
</form>