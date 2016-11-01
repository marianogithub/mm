<div class="p10">
<form action="<?php echo $visor->getUrlSave(); ?>" method="post" >
<fieldset id="formulario">
<?php echo Form::hidden( "id", $visor->getObjeto()->idparametro); ?>

	<legend><?php echo $visor->getEncabezado(); ?></legend>
		<table>
			<tr>
				<td>
					<?php echo Form::label( "Nombre" )?>
				</td>
				<td>
					<?php echo Form::input( "nombre", $visor->getObjeto()->nombre)?>
				</td>
			</tr>
			<tr>
				<td>
					<?php echo Form::label( "Valor" )?>
				</td>
				<td>
					<?php echo Form::input( "valor", $visor->getObjeto()->valor)?>
				</td>
			</tr>
			<tr>
				<td>
					<?php echo Form::label( "Descripcion" )?>
				</td>
				<td>
					<?php echo Form::input( "descripcion", $visor->getObjeto()->descripcion)?>
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