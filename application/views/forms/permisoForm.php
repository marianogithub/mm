<h2>
<?php
echo $usuario->nombre;
$irA = null;
if( strcmp( $usuario->tipousuario, $usuario->esRol ) == 0 ) {
	$irA = "Rol";
} else if( strcmp( $usuario->tipousuario, $usuario->esUsuario ) == 0 ) {
	$irA = "Usuario";
}
?>
</h2>
<form action="<?php echo $visor->getUrlSave(); ?>" method="post" >
<?php echo Form::hidden( "idusuario", $usuario->idusuario ); ?>
<fieldset id="formulario">
<legend>Permiso</legend>
<table>
<tr>
	<td><label class="control-label" >Menu</label></td>
	<td>
		<select name="idmenu" class="form-control" >
			<?php
			if( !is_null( $menus ) ) {
				foreach( $menus as $menuItem ) {
					$selected = "";
					echo "<option value='" . $menuItem->idmenu . "' >" . $menuItem->tipoMenu->nombre . " -> " . $menuItem->nombre . "</option>";
				}
			}
			?>
		</select>
	</td>
</tr>
<tr>
	<td><label class="control-label" >Orden</label></td>
	<td>
		<?php echo Form::input( "orden", "1", array('class' => "form-control" ));?>
	</td>
</tr>
</table>
</fieldset>
<div class="panel-footer well well-sm">
	<?php echo Form::submit( "Confirmar", "Confirmar", array('class' => "btn btn-primary" ) )?>
	<?php echo Form::button( "Cancelar", "Cancelar", array( 'type' => 'button', 'onClick' => "javascript: location.href='" . Kohana::$base_url . Kohana::$index_file . "/".$irA."/'", 'class' => "btn" ) )?>
</div>
<br>

<table class='table table-condensed table-bordered table-hover'>
	<thead>
		<tr class='bg-inverse'><th>Menú</th><th>Orden</th><th>Eliminar</th></tr>
	</thead>
<?php
$urlEliminarPermiso = Kohana::$index_file . "/Permiso/delete/id=";
echo "<tbody>";
foreach( $permisos as $value ) {
	echo "<tr><td>" . $value->menu->nombre . " (" . $value->menu->tipoMenu->nombre . ") - (".($value->menu->visible == 1 ? "Visible" : "Oculto").")</td>";
	echo "<td>" . $value->orden . "</td>";
	echo "<td>" . html::anchor( $urlEliminarPermiso . $value->idpermiso, "Eliminar" ) . "</td>";
}
echo "</tbody>";
?>
</table>
</form>