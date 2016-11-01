<?php
	function craerCombo($nombre, $valor) {
		$selectHTML = "";

		$selectHTML .=  "<select name='$nombre' class='form-control' >";
		$selectedSi = strcmp("1",$valor) == 0;
		$selected1 = $selectedSi ? "selected='selected'" : "";
		$selected0 = $selectedSi ? "" : "selected='selected'";
		$selectHTML .=  "<option value='1' $selected1 >Si</option>";
		$selectHTML .=  "<option value='0' $selected0 >No</option>";
		$selectHTML .=  "</select>";

		echo $selectHTML;
	}
?>
<div class="form-inline">
	
	<h5><strong><?php echo $nombreActual; ?></strong></h5>
	<table>
		<colgroup>
			<col width="300px">
			<col > 
		</colgroup>
		<tr>
			<td><label class="control-label">Padrón Municipal</label></td>
			<td><?php echo Form::input( "padronmun", $visor->getObjeto()->padronmun , array('class' => "form-control" ));?></td>
		</tr>
		<tr>
			<td><label class="control-label">Nomenclatura Catastral</label></td>
			<td><?php echo Form::input( "nomcat", $visor->getObjeto()->nomcat , array('class' => "form-control" ));?></td>
		</tr>
		<tr>
			<td><label class="control-label">Calle Principal Frente al Terreno</label></td>
			<td><?php echo Form::input( "calleppal", $visor->getObjeto()->calleppal , array('class' => "form-control" ));?></td>
		</tr>
		<tr>
			<td><label class="control-label">Calle 1: Perpendicular a la Calle Frentista</label></td>
			<td><?php echo Form::input( "calle1", $visor->getObjeto()->calle1 , array('class' => "form-control" ));?></td>
		</tr>
		<tr>
			<td><label class="control-label">Distancia de Calle 1 a Calle Frentista</label></td>
			<td><?php echo Form::input( "discalle1", $visor->getObjeto()->discalle1 , array('class' => "form-control" ));?></td>
		</tr>
		<tr>
			<td><label class="control-label">Calle 2: Perpendicular a la Calle Principal</label></td>
			<td><?php echo Form::input( "calle2", $visor->getObjeto()->calle2 , array('class' => "form-control" ));?></td>
		</tr>
		<tr>
			<td><label class="control-label">Distancia de Calle 2 a Calle Principal</label></td>
			<td><?php echo Form::input( "discalle2", $visor->getObjeto()->discalle2 , array('class' => "form-control" ));?></td>
		</tr>
		<tr>
			<td><label class="control-label">Zona o Barrio</label></td>
			<td><?php echo Form::input( "zonater", $visor->getObjeto()->zonater , array('class' => "form-control" ));?></td>
		</tr>
		<tr>
			<td><label class="control-label">Lote</label></td>
			<td><?php echo Form::input( "lote", $visor->getObjeto()->lote , array('class' => "form-control" ));?></td>
		</tr>
		<tr>
			<td><label class="control-label">Distrito</label></td>
			<td>
				<select name="distritot" class="form-control" >
					<?php
						foreach( $distritos as $distrito ) {
							$selected = strcmp($distrito->nombredistrito, $visor->getObjeto()->distritot) == 0 ? "selected=selected" : "";
							echo "<option value='" . $distrito->nombredistrito . "' $selected >" . $distrito->nombredistrito . "</option>";
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td><label class="control-label">Superficie del Terreno en m2</label></td>
			<td><?php echo Form::input( "supterr", $visor->getObjeto()->supterr , array('class' => "form-control" ));?></td>
		</tr>
		<tr>
			<td><label class="control-label">Servidumbre de paso de circulación</label></td>
			<td><?php craerCombo("servcirc", $visor->getObjeto()->servcirc); ?></td>
		</tr>
		<tr>
			<td><label class="control-label">Servidumbre de Gasoducto</label></td>
			<td><?php craerCombo("servgas", $visor->getObjeto()->servgas); ?></td>
		</tr>
		<tr>
			<td><label class="control-label">Servidumbre de Electroducto</label></td>
			<td><?php craerCombo("servelect", $visor->getObjeto()->servelect); ?></td>
		</tr>
		<tr>
			<td><label class="control-label">Servidumbre de Riego</label></td>
			<td><?php craerCombo("servriego", $visor->getObjeto()->servriego); ?></td>
		</tr>
		<tr>
			<td><label class="control-label">Terreno Baldio</label></td>
			<td><?php echo Form::input( "baldio", $visor->getObjeto()->baldio , array('class' => "form-control" ));?></td>
		</tr>
		<tr>
			<td><label class="control-label">Construcción a Demoler</label></td>
			<td><?php echo Form::input( "demoler", $visor->getObjeto()->demoler , array('class' => "form-control" ));?></td>
		</tr>
	</table>
</div>
