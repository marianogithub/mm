<div class="p10">
<form action="<?php echo $visor->getUrlSave(); ?>" method="post" >
<fieldset id="formulario">
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
			<td>
				<?php echo Form::label( "Nivel" )?>
			</td>
			<td>
				<?php echo Form::input( "nivel", $visor->getObjeto()->nivel)?>
			</td>
		</tr>
		</table>
	</fieldset>
	<div id="botonera">
		<?php echo Form::submit( "Confirmar", "Confirmar", array('class' => "btn-amarillo" ))?>
		<?php echo Form::button( "Cancelar", "Cancelar", array( 'type' => 'button', 'onClick' => "javascript: location.href='" . $visor->getUrlListado() . "'" , 'class' => "btn-gris") )?>
	</div>
</form>
</div>