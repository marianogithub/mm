
<form action="<?php echo $visor->getUrlSave(); ?>" method="post" class="form-inline">

<?php
echo Form::hidden( "id", $visor->getObjeto()->id);

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
				<label class="control-label">Nombre Usuario</label>
			</td>
			<td>
				<?php echo Form::input('username', $visor->getObjeto()->username, array('class' => "form-control")); ?>
			</td>
		</tr>
		<tr>
			<td>
				<label class="control-label">E-mail</label>
			</td>
			<td>
				<?php echo Form::input('email', $visor->getObjeto()->email, array('class' => "form-control")); ?>
			</td>
		</tr>
		<tr>
			<td>
				<label class="control-label">Password</label>
			</td>
			<td>
				<?php echo Form::password('password', '', array('class' => "form-control")); ?>
			</td>
		</tr>
		<tr>
			<td>
				<label class="control-label">Confirmar Password</label>
			</td>
			<td>
				<?php echo Form::password('password_confirm', '', array('class' => "form-control")); ?>
			</td>
		</tr>
		</table>
	<div class="panel-footer well well-sm text-right">
		<?php echo Form::submit( "Confirmar", "Confirmar", array('class' => "btn btn-primary" ))?>
		<?php echo Form::button( "Cancelar", "Cancelar", array( 'type' => 'button', 'onClick' => "javascript: location.href='" . $visor->getUrlListado() . "'" , 'class' => "btn") )?>
</form>
</div>