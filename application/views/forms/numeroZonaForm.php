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
            <td><label class="control-label">Número</label></td>
            <td>
                <select name="numero" class="form-control" >
                    <?php
                    foreach($numeros as $numero) {
                        $selected = "";
                        if($visor->getObjeto()->numero != null && $visor->getObjeto()->numero == $numero ) {
                            $selected = "selected=selected";
                        }
                        echo "<option value='" . $numero . "' $selected >" . $numero . "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label class="control-label">Zonas</label></td>
            <td>
                <select name="idzonas" class="form-control" >
                    <?php
                    foreach($zonas as $zona) {
                        $selected = "";
                        if($visor->getObjeto()->idzonas != null && $visor->getObjeto()->idzonas == $zona->idzonas ) {
                            $selected = "selected=selected";
                        }
                        echo "<option value='" . $zona->idzonas . "' $selected >" . $zona->nombre . "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
    </table>
    <div class="panel-footer well well-sm">
        <?php echo Form::submit( "Confirmar", "Confirmar", array('class' => "btn btn-primary" ))?>
        <?php echo Form::button( "Cancelar", "Cancelar", array( 'type' => 'button', 'onClick' => "javascript: location.href='" . $visor->getUrlListado() . "'" , 'class' => "btn") )?>
    </div>
</form>