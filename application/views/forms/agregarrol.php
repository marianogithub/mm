<h5><?php echo $visor->getEncabezado(); ?></h5>

<form action="<?php echo $visor->getUrlListado() ?>" method="post" class="form-inline" >
	<?php
		echo Form::submit( "Cancelar", "Cancelar" );
	?>
</form>
<br>

<table class='table table-xxcondensed table-no-border'>
<tr><th>Roles asignados</th><th>Roles</th></tr>
<tr><td>
<table>
<?php
$urlQuitarRol = Kohana::$base_url . Kohana::$index_file . "/User/quitarrol/";
foreach( $rolesAsignados as $value )
{
	echo "<tr><td><form action='$urlQuitarRol' method='post' >";
	echo Form::hidden( "id", $visor->getObjeto()->id );
	echo Form::hidden( "idrol", $value->id );
	echo Form::submit( "Quitar Rol $value->name", "Quitar Rol $value->name" );
	echo "</form></td></tr>";
}
?>
</table>
</td>
<td>
<table class='table table-xxcondensed table-no-border'>
<?php
$urlAddRol = Kohana::$base_url . Kohana::$index_file . "/User/agregarrol/";
foreach( $roles as $value )
{
	echo "<tr><td><form action='$urlAddRol' method='post' >";
	echo Form::hidden( "id", $visor->getObjeto()->id );
	echo Form::hidden( "idrol", $value->id );
	echo Form::submit( "Agregar Rol $value->name", "Agregar Rol $value->name" );
	echo "</form></td></tr>";
}
?>
</table>
</td>
</tr>
</table>
</form>