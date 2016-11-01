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
            <td><label class="control-label">Gremio Observación</label></td>
            <td>
                <label class="control-label"><?php echo $visor->getObjeto()->descripcion->observacion->sector->gremio->nombre; ?></label>
            </td>
        </tr>
        <tr>
            <td><label class="control-label">Sector Oficial</label></td>
            <td>
                <label class="control-label"><?php echo $visor->getObjeto()->descripcion->observacion->sector->nombre; ?></label>
            </td>
        </tr>
        <tr>
            <td><label class="control-label">Observación Oficial</label></td>
            <td>
                <label class="control-label"><?php echo $visor->getObjeto()->descripcion->observacion->nombre; ?></label>
            </td>
        </tr>
        <tr>
            <td><label class="control-label">Descripción Oficial</label></td>
            <td>
                <select name="iddescripcion" class="form-control" >
                    <?php
                    foreach($asociados as $asociado) {
                        $selected = "";
                        if($visor->getObjeto()->iddescripcion != null && $visor->getObjeto()->iddescripcion == $asociado->pk()) {
                            $selected = "selected=selected";
                        }
                        echo "<option value='" . $asociado->pk() . "' $selected >" . $asociado->nombre . "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label class="control-label">Nombre</label></td>
            <td>
                <?php echo Form::input( "nombre", $visor->getObjeto()->nombre, array('class' => "form-control"))?>
            </td>
        </tr>
    </table>
    <div class="panel-footer well well-sm">
        <?php echo Form::submit( "Confirmar", "Confirmar", array('class' => "btn btn-primary" ))?>
        <?php echo Form::button( "Cancelar", "Cancelar", array( 'type' => 'button', 'onClick' => "javascript: location.href='" . $visor->getUrlListado() . "'" , 'class' => "btn") )?>
    </div>
</form>