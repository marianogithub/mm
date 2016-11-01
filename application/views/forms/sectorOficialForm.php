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
                <select name="idgremioobs" class="form-control" >
                    <?php
                    $idGremio = null;
                    foreach($gremios as $gremio) {
                        $selected = "";
                        if($visor->getObjeto()->idgremioobs != null && $visor->getObjeto()->idgremioobs == $gremio->idgremioobs ) {
                            $idGremio = $gremio->idgremioobs;
                            $selected = "selected=selected";
                        }
                        echo "<option value='" . $gremio->idgremioobs . "' $selected >" . $gremio->nombre . "</option>";
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
        <?php echo Form::button( "Cancelar", "Cancelar", array(
            'type' => 'button',
            'onClick' => "javascript: location.href='" . $visor->getUrlListado() . "/id=$idGremio'" ,
            'class' => "btn") )?>
    </div>
</form>