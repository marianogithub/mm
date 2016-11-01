
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<?php require_once 'application/classes/util/Script.php'; ?>
<?php require_once 'application/config/server.php'; ?>

<head>
	<title>SGE - Registracion</title>
	<?php
	
	echo "<link rel='shortcut icon' href='" . Server::$dominio . "/favicon.png' />";
	
	$scripts = new Script();
	
	echo $scripts->getJSLibsAll();
	echo $scripts->getCssAll();
	
	?>
	<style type="text/css">
		form{
			width: 30%;
			margin:90px;
			border: 2px solid #ccc;
		} 
	</style>
	<script type="text/javascript">
		$( "#usernameid" ).focus();
	</script>
</head>
<body>


<form action="<?php echo $visor->getUrl( "loguear" ); ?>" method="post" role="form">
 
<div  style="padding:6px; ">  
	
	<table class="table table-xxcondensed table-no-border">
		<tr>	
			<td><?php echo Form::label( "Usuario" )?></td>
			<td><?php echo Form::input('username', HTML::chars(Arr::get($_POST, 'username')), array( "id" => "usernameid" ,'class' => "form-control" )); ?></td>
		</tr>
		
		<tr>
			<td><?php echo Form::label( "Contrasena" )?></td>
			<td><?php echo Form::password('password', null, array('class' => "form-control")); ?></td>
		</tr>
		<tr> 
			<td colspan="2"><br/></td>
		</tr>
		<tr> 
			<td colspan="2" class="alert alert-warning">
				<div class="checkbox">
	    			<label>
						<?php echo Form::checkbox( 'remember' ); ?>Recordame
					</label>
	  			</div>
	  			<blockquote class="blockquote-reverse">
					<p>Recordame</p> 
					<footer>te mantiene logueado por dos semanas</footer>
				</blockquote>
			</td>
		</tr>
	</table>
	<br/>
	<div class="text-right">
		<?php echo Form::button( "Cancelar", "Cancelar", array( 'type' => 'button', 'onClick' => "javascript: location.href='" . $visor->getUrlListado() . "'" , 'class' => "btn" ))?>
		<?php echo Form::submit( "Confirmar", "Confirmar", array('class' => "btn btn-primary" ) )?>
	</div>
</div>

</form>

</body>


</html>
