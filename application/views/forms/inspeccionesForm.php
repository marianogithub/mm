<?php require_once 'application/classes/util/dateUtil.php'; ?>

<form action="<?php echo $visor->getUrlSave(); ?>" method="post" >
<fieldset id="formulario">
<?php
echo Form::hidden( "id", $visor->getObjeto()->pk());
echo Form::hidden( "idexpte", $visor->getObjeto()->idexpte);

if( sizeof( $visor->getObjeto()->getErrores() ) > 0 ) {
	echo "<div id='error'>"; 
	echo "<ul>";
	foreach( $visor->getObjeto()->getErrores() as $error ) {
		echo "<li>$error</li>";
	}
	echo "</ul>";
	echo "</div>";
}
?>
	<legend><?php echo $visor->getEncabezado(); ?></legend>
	<table>
		<colgroup>
			<col width="150px">
			<col >
		</colgroup>
		<tr>
			<td><label class="control-label">Fecha de Solicitud de Inspeccion</label></td>
			<td>
				<input type="text" readonly="readonly" name="fechainspeccion" class="form-control"
					value="<?php echo $visor->getObjeto()->getFechainspeccionStr();?>" id="datepicker" >
			</td>
		</tr>
		<tr>
			<td><label class="control-label">Gremio Observacion</label></td>
			<td>
				<select name="idgremioobs" id="idgremioobs" onchange="actualizarInspecciones();" class="form-control" >
					<?php
					echo "<option value='0' >Elegir Gremio</option>";
					foreach( $gremioObservaciones as $gremioObservacion ) {
						$selected = "";
						if( $visor->getObjeto()->idgremioobs != null &&
							$visor->getObjeto()->idgremioobs == $gremioObservacion->idgremioobs ) {
							$selected = "selected=selected";
						}
						echo "<option value='" . $gremioObservacion->idgremioobs . "' $selected >" . $gremioObservacion->nombre . "</option>";
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td><label class="control-label">Tipo de Inspeccion</label></td>
			<td  colspan="3">
				<select name="idlistado" id="idlistado" class="form-control" >
				<?php
				foreach( $inspeccionesObra as $inspeccionObra ) {
					$selected = "";
					if( $visor->getObjeto()->inspeccionobra != null &&
						$visor->getObjeto()->inspeccionobra->idlistado == $inspeccionObra->idlistado ) {
						$selected = "selected=selected";
					}
					echo "<option value='" . $inspeccionObra->idlistado . "' $selected >" . $inspeccionObra->concepto . "</option>";
				}
				?>
				</select>
			</td>
		</tr>
		<tr>
			<td><label class="control-label">Nivel</label></td>
			<td>
				<select name="idnivel" class="form-control" >
					<?php
					foreach( $niveles as $nivel ) {
						$selected = "";
						if( $visor->getObjeto()->idnivel != null && $visor->getObjeto()->idnivel == $nivel->idnivel ) {
							$selected = "selected=selected";
						}
						echo "<option value='" . $nivel->idnivel . "' $selected >" . $nivel->nivel . "</option>";
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td><label class="control-label">Cartel</label></td>
			<td>
				<select name="cartel" class="form-control" >
					<?php
						$selectedSi = strcmp("1",$visor->getObjeto()->cartel) == 0;
						$selected1 = $selectedSi ? "selected='selected'" : "";
						$selected0 = $selectedSi ? "" : "selected='selected'";
					?>
					<option value='1' <?php echo $selected1; ?> >Si</option>
					<option value='0' <?php echo $selected0; ?> >No</option>
				</select>
			</td>
		</tr>
		<tr>
			<td><label class="control-label">Sector</label></td>
			<td>
				<?php echo Form::input( "sector", $visor->getObjeto()->sector, array('class' => "form-control" ))?>
			</td>
		</tr>
		<tr>
			<td><label class="control-label">Comentarios del Director Tecnico</label></td>
			<td>
				<?php echo Form::input( "comentarios", $visor->getObjeto()->comentarios, array('class' => "form-control" ))?>
			</td>
		</tr>
        <tr>
            <td><label class="control-label">Total</label></td>
            <td>
                <select name="total" class="form-control" >
                    <?php
                    foreach( $totales as $total ) {
                        $selected = "";
                        if( $visor->getObjeto()->total != null && strcmp($total, $visor->getObjeto()->total) == 0 ) {
                            $selected = "selected=selected";
                        }
                        echo "<option value='$total' $selected >$total</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
		<?php
			if($isAdmin) {
				echo "<tr>";
				echo "<td><label class='control-label'>Estado</label></td>";
				echo "<td>";
				?>
				
				<select name="estado" class="form-control" >
                    <?php
                    foreach( $estados as $estado ) {
                        $selected = "";
                        if( $visor->getObjeto()->estado != null && strcmp($estado, $visor->getObjeto()->estado) == 0 ) {
                            $selected = "selected=selected";
                        }
                        echo "<option value='$estado' $selected >$estado</option>";
                    }
                    ?>
                </select>

				<?php
				echo "</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td><label class='control-label'>Inspector</label></td>";
				echo "<td>";
				echo Form::input( "inspector", $visor->getObjeto()->inspector, array('class' => "form-control" ));
				echo "</td>";
				echo "</tr>";

				echo "<tr>";
				echo "<td><label class='control-label'>Comentarios del Inspector</label></td>";
				echo "<td>";
				echo Form::textarea('test',$comentsinspector);
				echo "</td>";

				echo "</tr>";


			}
		?>
		<tr>
			<td><label class="control-label">Fecha Efectiva de Inspeccion</label></td>
			<td>
				<input type="text" readonly="readonly" name="fechainspeccion" class="form-control"
					value="<?php echo $visor->getObjeto()->getFechainspeccionStr();?>" id="fechaEfectivaId" >
			</td>
		</tr>		

	</table>
</fieldset>

<div class="panel-footer well well-sm">
	<?php echo Form::submit( "Confirmar", "Confirmar", array('class' => "btn btn-primary" ))?>
	<?php echo Form::button( "Cancelar", "Cancelar",
			array(	'type' => 'button',
					'onClick' => "javascript: location.href='" . $visor->getUrlListado() . "/id=".$visor->getObjeto()->idexpte."'" ,
					'class' => "btn") )?>
</div>
</form>

<script>
var dpC = $( "#datepicker" );
var fechaEfectivaC = $("#fechaEfectivaId");
var gremioC = $( "#idgremioobs" );
var inspeccionObraC = $( "#idlistado" );
var urlInspeccionAjax = "<?php echo Server::$dominio . "/" . Server::$indexFile . "/InspeccionObraPorGremioAjax/index/idgremioobs=" ?>";
var idinspeccionobra = <?php echo is_null($visor->getObjeto()->idlistado) ? "null" : $visor->getObjeto()->idlistado; ?>;

var dateFormat = "<?php echo DateUtil::getFormatoDatePicker(); ?>";
var formatos = {
    dateFormat: dateFormat,
    beforeShowDay: $.datepicker.noWeekends
};
var maxDiasPre = <?php echo is_null( $minDateFechaInspeccion ) ? "null" : $minDateFechaInspeccion; ?>;

$(function() {
	if( maxDiasPre != null ) {
		formatos.minDate = maxDiasPre;
	}

	//datepicker para fecha de solicitud
	dpC.datepicker(formatos);
	dpC.datepicker( "option", $.datepicker.regional["es"] );

	//datepicker para fecha definitiva
	fechaEfectivaC.datepicker(formatos);
	fechaEfectivaC.datepicker( "option", $.datepicker.regional["es"] );
});



function actualizarInspecciones() {
	var urlFinal =  urlInspeccionAjax + gremioC.val();
	$.ajax({
		url: urlFinal,
		dataType: "json",
		cache: false,
		success: function( dataResult ) {
			inspecciones = dataResult.inspeccionesObra;
			inspeccionObraC.html( "" );
			if( inspecciones != null && inspecciones.length > 0 ) {
				for( var i = 0; i < inspecciones.length; i++ ) {
					var inspeccion = inspecciones[i];
					var selected = (inspecciones.value == idinspeccionobra) ? "selected='selected'" : "";
					var html = "<option value='" + inspeccion.value + "' " + selected + " >" + inspeccion.text + "</option>";
					inspeccionObraC.append(html);
				}
			}
		}
	});
}
</script>