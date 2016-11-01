<?php
function addCheckbox($id, $name) {
    echo "<input type='checkbox' name='$name' id='$id' checked='checked' >";
}
?>
<div class="form-inline" id="idDivContainer" >
<div class="well" style="border-left: 4px solid #000;" >
	<h5><strong>Proyecto</strong></h5>
	<table>
		<colgroup>
			<col width="250px">
			<col >
		</colgroup>
		<tr>
			<td><label class="control-label">Matrícula del Profesional</label></td>
			<td><?php echo Form::input( "clavearq", $visor->getObjeto()->clavearq , array('class' => "form-control" ));?></td>
		</tr>
		<tr>
			<td><label class="control-label">Caja Provincial</label></td>
			<td><?php echo Form::input( "cajaproy", $visor->getObjeto()->cajaproy , array('class' => "form-control" ));?></td>
		</tr>
		<tr>
			<td><label class="control-label">Certificado del Colegio</label></td>
			<td><?php echo Form::input( "certproy", $visor->getObjeto()->certproy , array('class' => "form-control" ));?></td>
		</tr>
	</table>
</div>

<div class="well" style="border-left: 4px solid #428bca;">
	<h5><?php addCheckbox("dirTecnicaId", "dirTecnicaName"); ?>
        <strong>Dirección Técnica</strong>
    </h5>
	<table id="dirTecnicaIdDiv" >
		<colgroup>
			<col width="250px">
			<col > 
		</colgroup>
		<tr>
			<td><label class="control-label">Matrícula del Profesional</label></td>
			<td><?php echo Form::input( "clavedirtec", $visor->getObjeto()->clavedirtec , array('class' => "form-control" ));?></td>
		</tr>
		<tr>
			<td><label class="control-label">Caja Provincial</label></td>
			<td><?php echo Form::input( "cajadittec", $visor->getObjeto()->cajadittec , array('class' => "form-control" ));?></td>
		</tr>
		<tr>
			<td><label class="control-label">Certificado del Colegio</label></td>
			<td><?php echo Form::input( "certdittec", $visor->getObjeto()->certdittec , array('class' => "form-control" ));?></td>
		</tr>
	</table>
</div>

<div class="well" style="border-left: 4px solid #000;">
	<h5><?php addCheckbox("calculoId", "calculoName"); ?>
        <strong>Cálculo</strong>
    </h5>
	<table id="calculoIdDiv" >
		<colgroup>
			<col width="250px">
			<col >
		</colgroup>
		<tr>
			<td ><label class="control-label">Matrícula del Profesional</label></td>
			<td><?php echo Form::input( "clavecal", $visor->getObjeto()->clavecal , array('class' => "form-control" ));?></td>
		</tr>
		<tr>
			<td><label class="control-label">Caja Provincial</label></td>
			<td><?php echo Form::input( "cajacal", $visor->getObjeto()->cajacal , array('class' => "form-control" ));?></td>
		</tr>
		<tr>
			<td><label class="control-label">Certificado del Colegio</label></td>
			<td><?php echo Form::input( "certcal", $visor->getObjeto()->certcal , array('class' => "form-control" ));?></td>
		</tr>
	</table>
</div>

<div class="well" style="border-left: 4px solid #428bca;">
	<h5><?php addCheckbox("dirEstructuraId", "dirEstructuraName"); ?>
        <strong>Dir. Estructura</strong>
    </h5>
	<table id="dirEstructuraIdDiv" >
		<colgroup>
			<col width="250px">
			<col >
		</colgroup>
		<tr>
			<td><label class="control-label">Matrícula del Profesional</label></td>
			<td><?php echo Form::input( "clavedirest", $visor->getObjeto()->clavedirest , array('class' => "form-control" ));?></td>
		</tr>
		<tr>
			<td><label class="control-label">Caja Provincial</label></td>
			<td><?php echo Form::input( "cajadirest", $visor->getObjeto()->cajadirest , array('class' => "form-control" ));?></td>
		</tr>
		<tr>
			<td><label class="control-label">Certificado del Colegio</label></td>
			<td><?php echo Form::input( "certdirest", $visor->getObjeto()->certdirest , array('class' => "form-control" ));?></td>
		</tr>
	</table>
</div>

<div class="well" style="border-left: 4px solid #000;">
	<h5><?php addCheckbox("electricidadId", "electricidadName"); ?>
        <strong>Proyecto Electricidad</strong>
    </h5>
	<table id="electricidadIdDiv" >
		<colgroup>
			<col width="250px">
			<col > 
		</colgroup>
		<tr>
			<td><label class="control-label">Matrícula del Profesional</label></td>
			<td><?php echo Form::input( "claveelec", $visor->getObjeto()->claveelec , array('class' => "form-control" ));?></td>
		</tr>
		<tr>
			<td><label class="control-label">Caja Provincial</label></td>
			<td><?php echo Form::input( "cajaelec", $visor->getObjeto()->cajaelec , array('class' => "form-control" ));?></td>
		</tr>
		<tr>
			<td><label class="control-label">Certificado del Colegio</label></td>
			<td><?php echo Form::input( "certelec", $visor->getObjeto()->certelec , array('class' => "form-control" ));?></td>
		</tr>
	</table>
</div>

<div class="well" style="border-left: 4px solid #428bca;">
	<h5><?php addCheckbox("dirElectricidadId", "dirElectricidadName"); ?>
        <strong>Dir. Tec. Electrica</strong>
    </h5>
	<table id="dirElectricidadIdDiv" >
		<colgroup>
			<col width="250px">
			<col > 
		</colgroup>
		<tr>
			<td><label class="control-label">Matrícula del Profesional</label></td>
			<td><?php echo Form::input( "claveelecdirtec", $visor->getObjeto()->claveelecdirtec , array('class' => "form-control" ));?></td>
		</tr>
		<tr>
			<td><label class="control-label">Caja Provincial</label></td>
			<td><?php echo Form::input( "cajaelectdirtec", $visor->getObjeto()->cajaelectdirtec , array('class' => "form-control" ));?></td>
		</tr>
		<tr>
			<td><label class="control-label">Certificado del Colegio</label></td>
			<td><?php echo Form::input( "certelectdirtec", $visor->getObjeto()->certelectdirtec , array('class' => "form-control" ));?></td>
		</tr>
	</table>
</div>

<div class="well" style="border-left: 4px solid #000;">
	<h5><?php addCheckbox("sanitarioId", "sanitarioName"); ?>
        <strong>Proyecto Sanitario</strong>
    </h5>
	<table id="sanitarioIdDiv" >
		<colgroup>
			<col width="250px">
			<col > 
		</colgroup>
		<tr>
			<td><label class="control-label">Matrícula del Profesional</label></td>
			<td><?php echo Form::input( "clavesani", $visor->getObjeto()->clavesani , array('class' => "form-control" ));?></td>
		</tr>
		<tr>
			<td><label class="control-label">Caja Provincial</label></td>
			<td><?php echo Form::input( "cajasani", $visor->getObjeto()->cajasani , array('class' => "form-control" ));?></td>
		</tr>
		<tr>
			<td><label class="control-label">Certificado del Colegio</label></td>
			<td><?php echo Form::input( "certasani", $visor->getObjeto()->certasani , array('class' => "form-control" ));?></td>
		</tr>
	</table>
</div>

<div class="well" style="border-left: 4px solid #428bca;">
	<h5><?php addCheckbox("dirSanitarioId", "dirSanitarioName"); ?>
        <strong>Dir. Tec. Sanitario</strong>
    </h5>
	<table id="dirSanitarioIdDiv" >
		<colgroup>
			<col width="250px">
			<col > 
		</colgroup>
		<tr>
			<td><label class="control-label">Matrícula del Profesional</label></td>
			<td><?php echo Form::input( "clavesanidirtec", $visor->getObjeto()->clavesanidirtec , array('class' => "form-control" ));?></td>
		</tr>
		<tr>
			<td><label class="control-label">Caja Provincial</label></td>
			<td><?php echo Form::input( "cajasanidirtec", $visor->getObjeto()->cajasanidirtec , array('class' => "form-control" ));?></td>
		</tr>
		<tr>
			<td><label class="control-label">Certificado del Colegio</label></td>
			<td><?php echo Form::input( "certsanidirtec", $visor->getObjeto()->certsanidirtec , array('class' => "form-control" ));?></td>
		</tr>
	</table>
</div>
</div>
<script>
$(document).ready(function(){
    $( "#idDivContainer :checkbox" ).change(function() {
        var divCtrl = $("#" + $(this).attr("id") + "Div");
        $(this).is(":checked") ? divCtrl.show() : divCtrl.hide();
    });
});
</script>