<form action="<?php echo $visor->getUrlSave(); ?>" method="post" >
<fieldset id="formulario">
<?php
echo Form::hidden( "id", $visor->getObjeto()->idmenu);

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
			<td><label class="control-label">Código</label></td>
			<td>
				<?php echo Form::input( "codigo", $visor->getObjeto()->codigo, array( "id" => "idcodigo", 'class' => "form-control"))?>
			</td>
		</tr>
		<tr>
			<td><label class="control-label">Nombre</label></td>
			<td>
				<?php echo Form::input( "nombre", $visor->getObjeto()->nombre, array('class' => "form-control" ))?>
			</td>
		</tr>
		<tr>
			<td><label class="control-label">URL</label></td>
			<td>
				<?php echo Form::input( "url", $visor->getObjeto()->url, array('class' => "form-control" ))?>
			</td>
		</tr>
		<tr>
			<td><label class="control-label">Visible?</label></td>
			<td>
				<?php echo Form::checkbox( "visible", $visor->getObjeto()->visible, $visor->getObjeto()->visible == 1 ? true : false, array('class' => "form-control" ) )?>
			</td>
		</tr>
		<tr>
			<td><label class="control-label">URL Imagen</label></td>
			<td>
				<?php echo Form::input( "urlimagen", $visor->getObjeto()->urlimagen, array('class' => "form-control" ))?>
			</td>
		</tr>
		<tr>
			<td><label class="control-label">Tipo Menu</label></td>
			<td>
				<select name="idtipomenu" class="control-label" >
					<?php
					foreach( $tiposMenu as $tipoMenuItem )
					{
						$selected = "";
						if( $visor->getObjeto()->idtipomenu != null && $visor->getObjeto()->idtipomenu == $tipoMenuItem->idtipomenu )
						{
							$selected = "selected=selected";
						}
						echo "<option value='" . $tipoMenuItem->idtipomenu . "' $selected >" . $tipoMenuItem->nombre . "</option>";
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td><label class="control-label">Super Menu</label></td>
			<td>
				<select name="idpadre" class="control-label" >
					<?php
					echo "<option value='0' >Sin super menu</option>";
					foreach( $menus as $menuItem )
					{
						$selected = "";
						if( $visor->getObjeto()->idpadre != null && $visor->getObjeto()->idpadre == $menuItem->idmenu )
						{
							$selected = "selected=selected";
						}
						echo "<option value='" . $menuItem->idmenu . "' $selected >" . $menuItem->nombre . "</option>";
					}
					?>
				</select>
			</td>
		</tr>
		</table>
	</fieldset>
	<div class="panel-footer well well-sm">
		<?php echo Form::submit( "Confirmar", "Confirmar", array('class' => "btn btn-primary" ))?>
		<?php echo Form::button( "Cancelar", "Cancelar", array( 'type' => 'button', 'onClick' => "javascript: location.href='" . $visor->getUrlListado() . "'" , 'class' => "btn") )?>
	</div>
</form>

<script>
$( "#idcodigo" ).focus();
</script>