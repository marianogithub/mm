<?php
function dibujarCombo( $label, $name, $listado, $campoId, $campoValor) {
    echo "<tr>";
    echo "<td><label class='control-label' >$label</label></td>";
    echo "<td>";
    echo "<select name='$name' class='form-control' >";
    foreach( $listado as $item ) {
        $itemId = "" . $item->$campoId . "";
        $itemValor = $item->$campoValor;

        echo "<option value='$itemId' >$itemValor</option>";
    }
    echo "</select>";
    echo "</td>";
    echo "</tr>";
}
?>

<h5><strong><?php echo $visor->getEncabezado() . " " . $zonasCargadas->numerozona->getNumeroZonaStr(); ?></strong></h5>

<form action="<?php echo $visor->getUrlSave(); ?>" method="post" >
<div class="col-md-6">
<table>
    <colgroup>
        <col width="150px">
        <col >
    </colgroup>
    <?php dibujarCombo( "Uso", "iduso", $usos, "iduso", "nombre"); ?>
</table>
<?php
echo Form::hidden("idzonascargadas", $zonasCargadas->pk(), array('id' => "idInputId"));
if( sizeof($errores) > 0 ) {
    echo "<div id='error'>";
    echo "<ul>";
    foreach($errores as $error) {
        echo "<li>$error</li>";
    }
    echo "</ul>";
    echo "</div>";
}
?>

    <div class="panel-footer well well-sm">
        <?php echo Form::submit( "Confirmar", "Confirmar", array('class' => "btn btn-primary" ))?>
        <?php echo Form::button( "Cancelar", "Cancelar", array(
            'type' => 'button',
            'onClick' => "javascript: location.href='" . Kohana::$base_url . Kohana::$index_file . "/Zonascargadas/'" ,
            'class' => "btn") )
        ?>
    </div>
</div>
</form>

<?php
//encabezado de la tabla.-
echo "<table class='table table-condensed table-bordered table-hover' >";
echo "<thead><tr class='bg-inverse'>";
foreach( $visor->getNombreColumnas() as $key => $value ) {
    echo "<th>$value</th>";
}
echo "</tr></thead>";

//datos de la tabla.-
foreach( $visor->getListado() as $key => $value ) {
    $id = $value->pk();
    echo "<tr>";
    echo "<td>" . $value->uso->nombre . "</td>";
    echo "<td>" . $visor->getDeleteLink( $id ) . "</td>";
    echo "</tr>";
}
echo "</table>";
?>

