<h5><strong><?php echo $visor->getEncabezado(); ?></strong></h5>

<div class="well well-info" >
    <form action="<?php echo $visor->getUrlListado(); ?>" id="formulario" method="post" >
        <?php
        $noElegido = '-1';
        echo Form::hidden("id", $id, array('id' => "idInputId"));
        if( sizeof($errores) > 0 ) {
            echo "<div id='error'>";
            echo "<ul>";
            foreach($errores as $error) {
                echo "<li>$error</li>";
            }
            echo "</ul>";
            echo "</div>";
        }
        ?>
        <table>
            <colgroup>
                <col width="150px">
                <col >
            </colgroup>
            <tr>
                <td><label class="control-label">Gremio Observación</label></td>
                <td>
                    <select id="idgremioobs" name="idgremioobs" class="form-control recargar" >
                        <?php
                        foreach($gremios as $gremio) {
                            $selected = "";
                            if($idGremio == $gremio->pk() ) {
                                $selected = "selected=selected";
                            }
                            echo "<option value='" . $gremio->idgremioobs . "' $selected >" . $gremio->nombre . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label class="control-label">Sector Oficial</label></td>
                <td>
                    <select id="idsectoroficial" name="idsectoroficial" class="form-control recargar" >
                        <?php
                        echo "<option value='$noElegido' >Elegir Sector Oficial</option>";
                        foreach( $sectoroficial as $sector ) {
                            $selected = "";
                            if($idSector != null && $idSector == $sector->pk() ) {
                                $selected = "selected=selected";
                            }
                            echo "<option value='" . $sector->idsector . "' $selected >".$sector->nombre."</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label class="control-label">Observación Oficial</label></td>
                <td>
                    <select id="idobservacionoficial" name="idobservacionoficial" class="form-control recargar" >
                        <?php
                        echo "<option value='$noElegido' >Elegir Observación Oficial</option>";
                        foreach($observaciones as $observacion) {
                            $selected = "";
                            if($idObservacion != null && $idObservacion == $observacion->pk()) {
                                $selected = "selected=selected";
                            }
                            echo "<option value='" . $observacion->pk() . "' $selected >" . $observacion->nombre . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label class="control-label">Descripción Oficial</label></td>
                <td>
                    <select id="iddescripcion" name="iddescripcion" class="form-control recargar" >
                        <?php
                        echo "<option value='$noElegido' >Elegir Detalle</option>";
                        foreach($descripciones as $descripcion) {
                            $selected = "";
                            if($idDescripcion != null && $idDescripcion == $descripcion->pk()) {
                                $selected = "selected=selected";
                            }
                            echo "<option value='" . $descripcion->pk() . "' $selected >" . $descripcion->nombre . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label class="control-label">Nombre</label></td>
                <td>
                    <?php echo Form::input( "nombre", $nombre, array('class' => "form-control"))?>
                </td>
            </tr>
        </table>
        <?php echo $visor->getButton("Confirmar", "Confirmar",array('id' => "idButtonSave",'class' => "btn btn-primary")); ?>
    </form>
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
    echo "<td>" . $value->descripcion->observacion->sector->gremio->nombre . "</td>";
    echo "<td>" . $value->descripcion->observacion->sector->nombre . "</td>";
    echo "<td>" . $value->descripcion->observacion->nombre . "</td>";
    echo "<td>" . $value->descripcion->nombre . "</td>";
    echo "<td>$value->nombre</td>";
    echo "<td><a href='javascript:void(0);' onclick='editar($id);'>" . $visor->getEditarLabel() . "</a></td>";
    echo "<td>" . $visor->getDeleteLink( $id ) . "</td>";
    echo "</tr>";
}
echo "</table>";
?>
<script>
    $( document ).ready(function() {
        $( "#idButtonSave" ).click(function() {
            $( "#formulario" ).attr('action', "<?php echo $visor->getUrlSave(); ?>").submit();
        });

        $( "#idgremioobs" ).change(function() {
            $("#idsectoroficial").val("-1");
            $("#idobservacionoficial").val("-1");
            $("#iddescripcion").val("-1");
            $("#idInputId").val("");
            $("#formulario").attr('action', "<?php echo $visor->getUrlListado(); ?>").submit();
        });
        $( "#idsectoroficial" ).change(function() {
            $("#idobservacionoficial").val("-1");
            $("#iddescripcion").val("-1");
            $("#idInputId").val("");
            $("#formulario").attr('action', "<?php echo $visor->getUrlListado(); ?>").submit();
        });
        $( "#idobservacionoficial" ).change(function() {
            $("#iddescripcion").val("-1");
            $("#idInputId").val("");
            $("#formulario").attr('action', "<?php echo $visor->getUrlListado(); ?>").submit();
        });
        $( "#iddescripcion" ).change(function() {
            $("#idInputId").val("");
            $("#formulario").attr('action', "<?php echo $visor->getUrlListado(); ?>").submit();
        });
    });

    function editar(id) {
        $("#idInputId").val(id);
        $("#formulario").attr('action', "<?php echo $visor->getUrlListado(); ?>").submit();
    }
</script>