<form action="<?php echo $visor->getUrlSave(); ?>" method="post" >
<fieldset id="formulario">
<?php
function agregarCampo($isAdminParam, $label, $name, $valor) {
    if($isAdminParam) {
        echo "<tr>";
        echo "<td><label class='control-label'>$label</label></td>";
        echo "<td>";
        echo Form::input( $name, $valor, array('class' => "form-control" ));
        echo "</td>";
        echo "</tr>";
    }
}

echo Form::hidden( "id", $visor->getObjeto()->pk());
echo Form::hidden( "idexpte", $visor->getObjeto()->expediente);

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
	<legend><?php echo $visor->getEncabezado(); ?></legend>
	<table>
		<colgroup>
			<col width="150px">
			<col >
		</colgroup>
        <!-- PERMISO DE ROTURA -->
		<tr>
			<td><label class="control-label">Permiso y Reparación Rotura</label></td>
			<td>
				<select name="idpermiso" class="form-control" >
				<?php
                echo "<option value='0' >Ninguno</option>";
				foreach( $permisos as $permiso ) {
					$selected = "";
					if( $visor->getObjeto()->idpermiso != null &&
						$visor->getObjeto()->idpermiso == $permiso->pk() ) {
						$selected = "selected=selected";
					}
					echo "<option value='" . $permiso->pk() . "' $selected >" . $permiso->descripcion . "</option>";
				}
				?>
				</select>
			</td>
		</tr>
        <tr>
            <td><label class="control-label">Cantidad en ml</label></td>
            <td>
                <?php echo Form::input( "mlpermiso", $visor->getObjeto()->mlpermiso, array('class' => "form-control" )); ?>
            </td>
        </tr>
        <?php //agregarCampo($isAdmin, "Monto de Permiso de Rotura", "montopermiso", $visor->getObjeto()->montopermiso); ?>

        <!-- ADICIONAL -->
        <tr>
            <td><label class="control-label">Adicional Eléctrico</label></td>
            <td>
                <select name="idobrasadicional" class="form-control" >
                    <?php
                    echo "<option value='0' >Ninguno</option>";
                    foreach( $adicionales as $adicional ) {
                        $selected = "";
                        if( $visor->getObjeto()->idobrasadicional != null &&
                            $visor->getObjeto()->idobrasadicional == $adicional->pk() ) {
                            $selected = "selected=selected";
                        }
                        echo "<option value='" . $adicional->pk() . "' $selected >" . $adicional->descripcion . "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label class="control-label">Cantidad</label></td>
            <td>
                <?php echo Form::input( "unidadobraadicional", $visor->getObjeto()->unidadobraadicional, array('class' => "form-control" )); ?>
            </td>
        </tr>
        <?php //agregarCampo($isAdmin, "Monto de Adicional de Obra", "montoobraadicional", $visor->getObjeto()->montoobraadicional); ?>

        <!-- AGUA -->
        <tr>
            <td><label class="control-label">Agua</label></td>
            <td>
                <select name="idagua" class="form-control" >
                    <?php
                    echo "<option value='0' >Ninguno</option>";
                    foreach( $aguas as $agua ) {
                        $selected = "";
                        if( $visor->getObjeto()->idagua != null &&
                            $visor->getObjeto()->idagua == $agua->pk() ) {
                            $selected = "selected=selected";
                        }
                        echo "<option value='" . $agua->pk() . "' $selected >" . $agua->descripcion . "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label class="control-label">Cantidad de Conexiones</label></td>
            <td>
                <?php echo Form::input( "unidadagua", $visor->getObjeto()->unidadagua, array('class' => "form-control" )); ?>
            </td>
        </tr>
        <?php //agregarCampo($isAdmin, "Monto de Agua", "montoagua", $visor->getObjeto()->montoagua); ?>

        <!-- CLOACAS -->
        <tr>
            <td><label class="control-label">Cloacas</label></td>
            <td>
                <select name="idcloacas" class="form-control" >
                    <?php
                    echo "<option value='0' >Ninguno</option>";
                    foreach( $cloacas as $cloaca ) {
                        $selected = "";
                        if( $visor->getObjeto()->idcloacas != null &&
                            $visor->getObjeto()->idcloacas == $cloaca->pk() ) {
                            $selected = "selected=selected";
                        }
                        echo "<option value='" . $cloaca->pk() . "' $selected >" . $cloaca->descripcion . "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label class="control-label">Cantidad de Conexiones</label></td>
            <td>
                <?php echo Form::input( "unidadcloacas", $visor->getObjeto()->unidadcloacas, array('class' => "form-control" )); ?>
            </td>
        </tr>
        <?php //agregarCampo($isAdmin, "Monto de Cloacas", "montocloacas", $visor->getObjeto()->montocloacas); ?>
        <?php agregarCampo($isAdmin, "Nº Recibo", "numerorecibo", $visor->getObjeto()->numerorecibo); ?>
	</table>
</fieldset>

<div class="panel-footer well well-sm">
	<?php echo Form::submit( "Confirmar", "Confirmar", array('class' => "btn btn-primary" ))?>
	<?php echo Form::button( "Cancelar", "Cancelar",
			array(	'type' => 'button',
					'onClick' => "javascript: location.href='" . $visor->getUrlListado() . "/id=".$visor->getObjeto()->expediente."'" ,
					'class' => "btn") )?>
</div>
</form>