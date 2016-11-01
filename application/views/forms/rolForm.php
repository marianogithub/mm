
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
	<table  >
	<tr>
		<td>
			<label class="control-label">Nombre</label>
		</td>
		<td>
			<?php echo Form::input( "nombre", $visor->getObjeto()->nombre , array('class' => "form-control"))?>
		</td>
		<tr>
		<td>
			<label class="control-label">Habilitado?</label>
		</td>
		<td>
			<?php echo Form::checkbox( "habilitado", $visor->getObjeto()->habilitado, $visor->getObjeto()->habilitado == 1 ? true : false )?>
		</td>
	</tr>
	</table>
	<div  class="panel-footer well well-sm text-right">
		<?php echo Form::submit( "Confirmar", "Confirmar", array('class' => "btn btn-primary" ) )?>
		<?php echo Form::button( "Cancelar", "Cancelar", array( 'type' => 'button', 'onClick' => "javascript: location.href='" . $visor->getUrlListado() . "'" , 'class' => "btn") )?>
	</div>

</form>
</div>