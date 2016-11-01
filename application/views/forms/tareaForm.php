<form action="<?php echo $visor->getUrlSave(); ?>" method="post" class="form-inline">

<?php
echo Form::hidden( "id", $visor->getObjeto()->pk());

if( sizeof( $visor->getObjeto()->getErrores() ) > 0 ) {
	echo "<div id='error' class='alert alert-danger'>"; 
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
			<td><label class="control-label">Tema</label></td>
			<td>
				<?php echo Form::input("tema", $visor->getObjeto()->tema, array('class' => "form-control" ))?>
			</td>
		</tr>
		<tr>
			<td><label class="control-label">Descripcion</label></td>
			<td>
				<textarea name="descripcion" class="form-control" ><?php echo $visor->getObjeto()->descripcion;?></textarea>
			</td>
		</tr>
		<tr>
			<td><label class="control-label">Finalizada</label></td>
			<td>
				<?php echo Form::checkbox("finalizada", $visor->getObjeto()->finalizada,
						$visor->getObjeto()->finalizada == 1 ? true : false, array('class' => "form-control" ));?>
			</td>
		</tr>
		<tr>
			<td><label class="control-label">Prioridad</label></td>
			<td>
				<select name="prioridad" class="form-control" >
					<?php
						for ($i = 0; $i < sizeof($visor->getObjeto()->prioridades); $i++) {
							$selected = "";
							if(($i + 1) == $visor->getObjeto()->prioridad) {
								$selected = "selected='selected'";
							}
							echo "<option value='".($i + 1)."' $selected >".$visor->getObjeto()->prioridades[$i]."</option>";
						}
					?>
				</select>
			</td>
		</tr>
		</table>
	</fieldset>
	<div class="panel-footer well well-sm text-right">
		<?php echo Form::submit( "Confirmar", "Confirmar", array('class' => "btn btn-primary" ))?>
		<?php echo Form::button( "Cancelar", "Cancelar",
				array( 'type' => 'button', 'onClick' => "javascript: location.href='" . $visor->getUrlListado() . "'" , 'class' => "btn") )?>
	</div>
</form>