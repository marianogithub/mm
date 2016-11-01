<?php require_once 'application/classes/util/dateUtil.php'; ?>
<form action="<?php echo $visor->getUrlSave(); ?>" id="formulario" method="post" >

<?php
echo Form::hidden( "id", $visor->getObjeto()->pk());
echo Form::hidden( "expediente", $visor->getObjeto()->expte);

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
<h5><strong><?php echo $visor->getEncabezado(); ?></strong></h5>
<table class="table table-xxcondensed table-no-border" style="width: 40%;" >
    <colgroup>
        <col width="130px">
        <col>
        <col width="90px">
    </colgroup>
    <tr>
        <td><label class="control-label">Gremio Observación</label></td>
        <td>
            <select name="idgremioobs" id="idgremioobs" class="form-control recargar" >
                <?php
                echo "<option value='0' >Elegir Gremio</option>";
                foreach( $gremioObservaciones as $gremioObservacion ) {
                    $selected = "";
                    if($idgremioobs != null && $idgremioobs == $gremioObservacion->idgremioobs ) {
                        $selected = "selected=selected";
                    }
                    echo "<option value='" . $gremioObservacion->idgremioobs . "' $selected >".$gremioObservacion->nombre."</option>";
                }
                ?>
            </select>
        </td>
        <td>
            <?php echo Form::input( "conectorGremio", "", array('class' => "form-control" ))?>
        </td>
    </tr>
    <tr>
        <td><label class="control-label">Sector Oficial</label></td>
        <td>
            <select name="idsectoroficial" id="idsectoroficial" class="form-control recargar" >
                <?php
                echo "<option value='0' >Elegir Sector Oficial</option>";
                foreach( $sectoroficial as $sector ) {
                    $selected = "";
                    if($idsectoroficial != null && $idsectoroficial == $sector["idsector"] ) {
                        $selected = "selected=selected";
                    }
                    echo "<option value='" . $sector["idsector"] . "' $selected >".$sector["nombre"]."</option>";
                }
                ?>
            </select>
        </td>
        <td>
            <?php echo Form::input( "conectorSector", "", array('class' => "form-control" ))?>
        </td>
    </tr>
    <tr>
        <td><label class="control-label">Observación Oficial</label></td>
        <td>
            <select name="idobservacionoficial" id="idobservacionoficial" class="form-control recargar" >
                <?php
                echo "<option value='0' >Elegir Observación</option>";
                foreach( $observacionoficial as $observacion ) {
                    $selected = "";
                    if($idobservacionoficial != null && $idobservacionoficial == $observacion["idobservacion"] ) {
                        $selected = "selected=selected";
                    }
                    echo "<option value='" . $observacion["idobservacion"] . "' $selected >".$observacion["nombre"]."</option>";
                }
                ?>
            </select>
        </td>
        <td>
            <?php echo Form::input( "conectorObservacion", "", array('class' => "form-control" ))?>
        </td>
    </tr>
    <tr>
        <td><label class="control-label">Descripcion Oficial</label></td>
        <td>
            <select name="iddescripcion" id="iddescripcion" class="form-control recargar" >
                <?php
                echo "<option value='0' >Elegir Descripción</option>";
                foreach( $descripcionoficial as $descripcion ) {
                    $selected = "";
                    if($iddescripcion != null && $iddescripcion == $descripcion["iddescripcion"] ) {
                        $selected = "selected=selected";
                    }
                    echo "<option value='" . $descripcion["iddescripcion"] . "' $selected >".$descripcion["nombre"]."</option>";
                }
                ?>
            </select>
        </td>
        <td>
            <?php echo Form::input( "conectorDescripcion", "", array('class' => "form-control" ))?>
        </td>
    </tr>
    <tr>
        <td><label class="control-label">Detalle</label></td>
        <td colspan="2" >
            <select name="iddetalle" id="iddetalle" class="form-control" >
                <?php
                echo "<option value='0' >Elegir Detalle</option>";
                foreach( $detalle as $det ) {
                    $selected = "";
                    if($iddetalle != null && $iddetalle == $det["iddetalle"] ) {
                        $selected = "selected=selected";
                    }
                    echo "<option value='" . $det["iddetalle"] . "' $selected >".$det["nombre"]."</option>";
                }
                ?>
            </select>
        </td>
    </tr>
    <tr>
        <td><label class="control-label">Profesional</label></td>
        <td colspan="2" >
            <?php echo Form::input( "profesional", $visor->getObjeto()->profesional, array('class' => "form-control" ))?>
        </td>
    </tr>
    <tr>
        <td><label class="control-label">Estado</label></td>
        <td colspan="2" >
            <?php echo Form::input( "estado", $visor->getObjeto()->estado, array('class' => "form-control" ))?>
        </td>
    </tr>
    <tr>
        <td><label class="control-label">Fecha Aprobación</label></td>
        <td>
            <input type="text" readonly="readonly" name="fechaaprobacion" class="form-control"
                   value="<?php echo $visor->getObjeto()->getFechaaprobacionStr();?>" id="datepicker" >
        </td>
        <td>
            <a href="#" onclick="limpiarFecha();">Borrar Fecha</a>
        </td>
    </tr>
</table>

<div class="panel-footer well well-sm">
	<?php echo Form::submit( "Confirmar", "Confirmar", array('class' => "btn btn-primary" ))?>
	<?php echo Form::button( "Cancelar", "Cancelar",
			array(	'type' => 'button',
					'onClick' => "javascript: location.href='" . $visor->getUrlListado() . "/id=".$visor->getObjeto()->expte."'" ,
					'class' => "btn") )?>
</div>
</form>

<script>
var newURL = "<?php echo $visor->getUrlNew()."/id=".$visor->getObjeto()->expte;?>";
var dpC = $( "#datepicker" );
var dateFormat = "<?php echo DateUtil::getFormatoDatePicker(); ?>";
var formatos = {
    dateFormat: dateFormat,
    beforeShowDay: $.datepicker.noWeekends
};

$( document ).ready(function() {
    $( ".recargar" ).change(function() {
        $( "#formulario" ).attr('action', newURL).submit();
    });
    dpC.datepicker(formatos);
    dpC.datepicker( "option", $.datepicker.regional["es"] );
});

function limpiarFecha() {
    dpC.val("");
}
</script>