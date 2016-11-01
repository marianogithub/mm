<div class="form-inline">
	
<div class="well" style="border-left: 4px solid #000;" >
	<h5><strong><?php echo $nombreActual; ?></strong></h5>
	
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
			<td><label class="control-label">Casa Nº</label></td>
			<td><?php echo Form::input( "manzanaLote", $visor->getObjeto()->manzanaLote , array('class' => "form-control" ));?></td>
		</tr>
		<tr>
			<td><label class="control-label">Distrito</label></td>
			<td>
				<select name="distrito" class="form-control" >
					<?php
						foreach( $distritos as $distrito ) {
							$selected = strcmp($distrito->nombredistrito, $visor->getObjeto()->distrito) == 0 ? "selected=selected" : "";
							echo "<option value='" . $distrito->nombredistrito . "' $selected >" . $distrito->nombredistrito . "</option>";
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td><label class="control-label">Departamento</label></td>
			<td><?php echo Form::input( "departemento", $visor->getObjeto()->departemento , array('class' => "form-control" ));?></td>
		</tr>
	</table>
</div>


<div class="well" style="border-left: 4px solid #428bca;" >
	<h5><strong>Datos del Poseedor</strong></h5>
	
	<table>
		<colgroup> 
			<col width="150px">
			<col >
		</colgroup>
		<tr>
			<td><label class="control-label">Poseedor</label></td>
			<td><?php echo Form::input( "poseedor", $visor->getObjeto()->poseedor , array('class' => "form-control") );?></td>
		</tr>
		<tr>
			<td><label class="control-label">DNI</label></td>
			<td><?php echo Form::input( "dnip", $visor->getObjeto()->dnip , array('class' => "form-control") );?></td>
		</tr>
		<tr>
			<td><label class="control-label">Domicilio</label></td>
			<td><?php echo Form::input( "domiciliop", $visor->getObjeto()->domiciliop , array('class' => "form-control") );?></td>
		</tr>
		<tr>
			<td><label class="control-label">Zona o Barrio</label></td>
			<td><?php echo Form::input( "zonap", $visor->getObjeto()->zonap , array('class' => "form-control") );?></td>
		</tr>
		<tr>
			<td><label class="control-label">Casa Nº</label></td>
			<td><?php echo Form::input( "manzanaLotep", $visor->getObjeto()->manzanaLotep , array('class' => "form-control") );?></td>
		</tr>
		<tr>
			<td><label class="control-label">Distrito</label></td>
			<td>
				<select name="distritop" class="form-control" >
					<?php
						foreach( $distritos as $distrito ) {
							$selected = strcmp($distrito->nombredistrito, $visor->getObjeto()->distritop) == 0 ? "selected=selected" : "";
							echo "<option value='" . $distrito->nombredistrito . "' $selected >" . $distrito->nombredistrito . "</option>";
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td><label class="control-label">Departamento</label></td>
			<td><?php echo Form::input( "departementop", $visor->getObjeto()->departementop , array('class' => "form-control"));?></td>
		</tr>
	</table>
	</div>
</div>