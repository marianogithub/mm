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
            <td><label class="control-label">Art�culo</label></td>
            <td>
                <?php echo Form::input( "Art", $visor->getObjeto()->Art, array('class' => "form-control"))?>
            </td>
        </tr>
        <tr>
            <td><label class="control-label">Inciso</label></td>
            <td>
                <?php echo Form::input( "Inc", $visor->getObjeto()->Inc, array('class' => "form-control"))?>
            </td>
        </tr>
        <tr>
            <td><label class="control-label">Item</label></td>
            <td>
                <?php echo Form::input( "It", $visor->getObjeto()->It, array('class' => "form-control"))?>
            </td>
        </tr>
        <tr>
            <td><label class="control-label">Apartado</label></td>
            <td>
                <?php echo Form::input( "Ap", $visor->getObjeto()->Ap, array('class' => "form-control"))?>
            </td>
        </tr>
        <tr>
            <td><label class="control-label">Destino</label></td>
            <td>
                <select name="Destino" class="form-control" >
                    <?php
                    foreach($destinos as $destino) {
                        $selected = "";
                        if( $visor->getObjeto()->Destino != null &&
                            (strcmp($visor->getObjeto()->Destino, $destino) == 0) ) {
                            $selected = "selected=selected";
                        }
                        echo "<option value='" . $destino . "' $selected >" . $destino . "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label class="control-label">CC</label></td>
            <td>
                <?php echo Form::input( "CC", $visor->getObjeto()->CC, array('class' => "form-control"))?>
            </td>
        </tr>
        <tr>
            <td><label class="control-label">L�mite Inferior</label></td>
            <td>
                <?php echo Form::input( "puntajeinferior", $visor->getObjeto()->puntajeinferior, array('class' => "form-control"))?>
            </td>
        </tr>
        <tr>
            <td><label class="control-label">L�mite Superior</label></td>
            <td>
                <?php echo Form::input( "puntajesuperior", $visor->getObjeto()->puntajesuperior, array('class' => "form-control"))?>
            </td>
        </tr>
    </table>
    <div class="panel-footer well well-sm">
        <?php echo Form::submit( "Confirmar", "Confirmar", array('class' => "btn btn-primary" ))?>
        <?php echo Form::button( "Cancelar", "Cancelar", array( 'type' => 'button', 'onClick' => "javascript: location.href='" . $visor->getUrlListado() . "'" , 'class' => "btn") )?>
    </div>
</form>