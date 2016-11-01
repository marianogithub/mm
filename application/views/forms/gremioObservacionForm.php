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

	<legend><?php echo $visor->getEncabezado(); ?></legend>
		<table>
			<tr>
                <td><label class="control-label">Nombre</label></td>
                <td>
                    <?php echo Form::input( "nombre", $visor->getObjeto()->nombre, array('class' => "form-control"))?>
                </td>
			</tr>
			<tr>
                <td><label class="control-label">Externo?</label></td>
				<td>
                    <select name="externo" class="form-control" >
						<?php
							$selectedSi = $visor->getObjeto()->externo == 1;
							$selected1 = $selectedSi ? "selected='selected'" : "";
							$selected0 = $selectedSi ? "" : "selected='selected'";
						?>
						<option value='1' <?php echo $selected1; ?> >Si</option>
						<option value='0' <?php echo $selected0; ?> >No</option>
					</select>
				</td>
			</tr>
		</table>

    <div class="panel-footer well well-sm">
		<?php echo Form::submit( "Confirmar", "Confirmar", array('class' => "btn btn-primary" ))?>
		<?php echo Form::button( "Cancelar", "Cancelar", array( 'type' => 'button', 'onClick' => "javascript: location.href='" . $visor->getUrlListado() . "'" , 'class' => "btn") )?>
	</div>
</form>