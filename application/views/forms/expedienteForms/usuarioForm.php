<div class="form-inline">
	
<div class="well" style="border-left: 4px solid #428bca;" >
	<h5><strong>Datos del Usuario</strong></h5>
	
	<table>
		<colgroup> 
			<col width="150px">
			<col >
		</colgroup>
		<tr>
			<td><label class="control-label">Nombre del Usuario</label></td>
			<td><?php echo Form::input( "poseedor", $visor->getObjeto()->poseedor , array('class' => "form-control") );?></td>
		</tr>
		<tr>
			<td><label class="control-label">E-mail</label></td>
			<td><?php echo Form::input( "dnip", $visor->getObjeto()->dnip , array('class' => "form-control") );?></td>
		</tr>
		<tr>
			<td><label class="control-label">Password</label></td>
			<td><?php echo Form::input( "domiciliop", $visor->getObjeto()->domiciliop , array('class' => "form-control") );?></td>
		</tr>
		<tr>
			<td><label class="control-label">Confirmar Password</label></td>
			<td><?php echo Form::input( "zonap", $visor->getObjeto()->zonap , array('class' => "form-control") );?></td>
		</tr>
	</table>
	</div>
</div>