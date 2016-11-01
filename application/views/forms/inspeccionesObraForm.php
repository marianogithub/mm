<div class="p10">
<form action="<?php echo $visor->getUrlSave(); ?>" method="post" >
<fieldset id="formulario">
<?php
echo Form::hidden("id", $visor->getObjeto()->pk());

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
	<legend><h3><?php echo $visor->getEncabezado(); ?></h3></legend>
	<table class="formTable" >
	<tr>
		<td>
			<?php echo Form::label( "Concepto" )?>
		</td>
		<td>
			<?php echo Form::input( "concepto", $visor->getObjeto()->concepto)?>
		</td>
	</tr>
	<tr>
		<td>
			<?php echo Form::label( "Gremio Observacion" )?>
		</td>
		<td>
			<select name="idgremioobs" >
				<?php
				foreach( $gremioObservaciones as $gremioObservacion )
				{
					$selected = "";
					if( $visor->getObjeto()->idgremioobs != null &&
						$visor->getObjeto()->idgremioobs == $gremioObservacion->idgremioobs )
					{
						$selected = "selected=selected";
					}
					echo "<option value='" . $gremioObservacion->idgremioobs . "' $selected >" . $gremioObservacion->nombre . "</option>";
				}
				?>
			</select>
		</td>
	</tr>
</table>
</fieldset>
<div id="botonera">
	<?php echo Form::submit( "Confirmar", "Confirmar" , array('class' => "btn-amarillo" ))?>
	<?php echo Form::button( "Cancelar", "Cancelar", array( 'type' => 'button', 'onClick' => "javascript: location.href='" . $visor->getUrlListado() . "'" , 'class' => "btn-gris") )?>
</div>
</form>
</div>