
<form action="<?php echo $visor->getUrlSave(); ?>" method="post" class="form-inline">

<?php
echo Form::hidden( "id", $visor->getObjeto()->idusuario);

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
		<td>
			<label class="control-label">Rol</label>
		</td>
		<td>
			<select name="idrol" class="form-control" >
				<?php
				echo "<option value='0' >Sin rol</option>";
				foreach( $roles as $rolItem )
				{
					$selected = "";
					if( $rol != null && $rol->idusuario == $rolItem->idusuario )
					{
						$selected = "selected=selected";
					}
					echo "<option value='" . $rolItem->idusuario . "' $selected >" . $rolItem->nombre . "</option>";
				}
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td>
			<label class="control-label">Nombre Usuario</label>
		</td>
		<td>
			<select name="iduser" class="form-control" >
				<?php
				echo "<option value='0' >No tiene cuenta</option>";
				foreach( $users as $userItem )
				{
					$selected = "";
					if( $user != null && $user->id == $userItem->id )
					{
						$selected = "selected=selected";
					}
					echo "<option value='" . $userItem->id . "' $selected >" . $userItem->username . "</option>";
				}
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td>
			<label class="control-label">Nombre</label>
		</td>
		<td>
			<?php echo Form::input( "nombre", $visor->getObjeto()->nombre, array('class' => "form-control"))?>
		</td>
	</tr>
	<tr>
		<td>
			<label class="control-label">Apellido</label>
		</td>
		<td>
			<?php echo Form::input( "apellido", $visor->getObjeto()->apellido, array('class' => "form-control"))?>
		</td>
	</tr>
	<tr>
		<td>
			<label class="control-label">Domicilio</label>
		</td>
		<td>
			<?php echo Form::input( "domicilio", $visor->getObjeto()->domicilio, array('class' => "form-control"))?>
		</td>
	</tr>
	<tr>
		<td>
			<label class="control-label">Telefono</label>
		</td>
		<td>
			<?php echo Form::input( "telefono", $visor->getObjeto()->telefono, array('class' => "form-control"))?>
		</td>
	</tr>
	<tr>
		<td>
			<label class="control-label">Celular</label>
		</td>
		<td>
			<?php echo Form::input( "celular", $visor->getObjeto()->celular, array('class' => "form-control"))?>
		</td>
	</tr>
	<tr>
		<td>
			<label class="control-label">E-mail</label>
		</td>
		<td>
			<?php echo Form::input( "email", $visor->getObjeto()->email, array('class' => "form-control"))?>
		</td>
	</tr>
	<tr>
		<td>
			<label class="control-label">Habilitado?</label>
		</td>
		<td>
			<?php echo Form::checkbox( "habilitado", $visor->getObjeto()->habilitado, $visor->getObjeto()->habilitado == 1 ? true : false )?>
		</td>
	</tr>
</table>

<div class="panel-footer well well-sm text-right">
	<?php echo Form::submit( "Confirmar", "Confirmar" , array('class' => "btn btn-primary" ))?>
	<?php echo Form::button( "Cancelar", "Cancelar", array( 'type' => 'button', 'onClick' => "javascript: location.href='" . $visor->getUrlListado() . "'" , 'class' => "btn") )?>
</div>
</form>
</div>
