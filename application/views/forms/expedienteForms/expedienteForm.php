<div class="form-inline">
	<h5><strong><?php echo $nombreActual; ?></strong></h5>
	<br/>
	<table>
		<colgroup>
			<col width="150px">
			<col >
		</colgroup>
		<tr>
			<td><label class="control-label">Nº Expediente</label></td>
			<td><?php echo Form::input( "expnumero", $visor->getObjeto()->expnumero, array('class' => "form-control" ));?></td>
		</tr>
		<tr>
			<td><label class="control-label">Definitivo</label></td>
			<td>
				<div class="checkbox">
					<?php echo Form::checkbox( "definitivo",
						$visor->getObjeto()->definitivo,
						$visor->getObjeto()->definitivo == 1 ? true : false )?>
				</div>
			</td>
		</tr>
	</table>
</div>