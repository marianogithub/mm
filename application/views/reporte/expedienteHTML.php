	<legend><?php echo $visor->getEncabezado(); ?></legend>
		<table>
			<colgroup>
				<col width="150px">
				<col > 
			</colgroup>
			<tr>
				<td><label class="control-label">Titular</label></td>
				<td><?php echo Form::input( "titular", $visor->getObjeto()->titular , array('class' => "form-control" ));?></td>
			</tr>
			<tr>
				<td><label class="control-label">DNI</label></td>
				<td><?php echo Form::input( "dni", $visor->getObjeto()->dni , array('class' => "form-control" ));?></td>
			</tr>
			<tr>
				<td><label class="control-label">Domicilio</label></td> 
				<td><?php echo Form::input( "domicilio", $visor->getObjeto()->domicilio , array('class' => "form-control" ));?></td>
			</tr>
			<tr>
				<td><label class="control-label">Zona o Barrio</label></td>
				<td><?php echo Form::input( "zona", $visor->getObjeto()->zona , array('class' => "form-control" ));?></td>
			</tr> 
			<tr> 
				<td><label class="control-label">Casa Nro</label></td>
				<td><?php echo Form::input( "manzanaLote", $visor->getObjeto()->manzanaLote , array('class' => "form-control" ));?></td>
			</tr>
			<tr>
				<td><label class="control-label">Distrito</label></td>
				<td><?php echo Form::input( "distrito", $visor->getObjeto()->distrito , array('class' => "form-control" ));?></td>
			</tr>
			<tr>
				<td><label class="control-label">Departamento</label></td>
				<td><?php echo Form::input( "departemento", $visor->getObjeto()->departemento , array('class' => "form-control" ));?></td>
			</tr>   
		</table> 
</fieldset>
	