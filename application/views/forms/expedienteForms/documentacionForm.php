<div class="form-inline">
	<h5><strong><?php echo $nombreActual; ?></strong></h5>
	
	<table>
		<colgroup>
			<col width="150px">
			<col >
		</colgroup>
		<tr>
			<td><label class="control-label">Planos Arquitectura</label></td>
			<td><?php echo Form::input( "planosarq", $visor->getObjeto()->planosarq , array('class' => "form-control" ));?></td>
		</tr>
		<tr>
			<td><label class="control-label">Planillas de Vent. Iluminacion</label></td>
			<td><?php echo Form::input( "ventilum", $visor->getObjeto()->ventilum , array('class' => "form-control" ));?></td>
		</tr>
		<tr>
			<td><label class="control-label">Planos Estructura</label></td>
			<td><?php echo Form::input( "planoestruc", $visor->getObjeto()->planoestruc , array('class' => "form-control" ));?></td>
		</tr>
		<tr>
			<td><label class="control-label">Memorias de Calculos</label></td>
			<td><?php echo Form::input( "memocal", $visor->getObjeto()->memocal , array('class' => "form-control" ));?></td>
		</tr>
		<tr>
			<td><label class="control-label">Planos Electricidad</label></td>
			<td><?php echo Form::input( "planoselec", $visor->getObjeto()->planoselec , array('class' => "form-control" ));?></td>
		</tr>
		<tr>
			<td><label class="control-label">Planos Sanitario</label></td>
			<td><?php echo Form::input( "planosanit", $visor->getObjeto()->planosanit , array('class' => "form-control" ));?></td>
		</tr>
		<tr>
			<td><label class="control-label">Certificado de Linea</label></td>
			<td><?php echo Form::input( "certflinea", $visor->getObjeto()->certflinea , array('class' => "form-control" ));?></td>
		</tr>
		<tr>
			<td><label class="control-label">Fotocopia de Escritura</label></td>
			<td><?php echo Form::input( "fotescritura", $visor->getObjeto()->fotescritura , array('class' => "form-control" ));?></td>
		</tr>
		<tr>
			<td><label class="control-label">Fotocopia Certificado Factibilidad</label></td>
			<td><?php echo Form::input( "certfactibilidad", $visor->getObjeto()->certfactibilidad , array('class' => "form-control" ));?></td>
		</tr>
		<tr>
			<td><label class="control-label">Planos de Mensura</label></td>
			<td><?php echo Form::input( "planosmensura", $visor->getObjeto()->planosmensura , array('class' => "form-control" ));?></td>
		</tr>
	</table>
</div>