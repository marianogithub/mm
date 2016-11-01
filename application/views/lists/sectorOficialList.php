<h5><strong><?php echo $visor->getEncabezado(); ?></strong></h5>

<div class="well well-info" >
    <form action="<?php echo $visor->getUrlListado(); ?>" method="post" >
        <table>
            <colgroup>
                <col width="150px">
                <col >
            </colgroup>
            <tr>
                <td><label class="control-label">Gremio Observación</label></td>
                <td>
                    <select id="idgremioobs" name="idgremioobs" class="form-control" >
                        <?php
                        foreach($gremios as $gremio) {
                            $selected = "";
                            if($idGremio == $gremio->idgremioobs ) {
                                $selected = "selected=selected";
                            }
                            echo "<option value='" . $gremio->idgremioobs . "' $selected >" . $gremio->nombre . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
        </table>
        <?php echo Form::submit( "filtrar", "Filtrar", array('class' => "btn btn-warning" ))?>
    </form>
</div>

<div class="text-right" style="margin:4px;">
    <?php echo $visor->getNewButton(array('onClick' => null), null); ?>
</div>

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
    echo "<td>" . $value->gremio->nombre . "</td>";
    echo "<td>$value->nombre</td>";
    echo "<td>" . $visor->getEditLink( $id ) . "</td>";
    echo "<td>" . $visor->getDeleteLink( $id ) . "</td>";
    echo "</tr>";
}
echo "</table>";
?>

<script>
    $( document ).ready(function() {
        $( "#idButtonNew" ).click(function() {
            var urlNew = "<?php echo $visor->getUrlNew() . "/id="; ?>" + $( "#idgremioobs" ).val();
            location.href = urlNew;
        });
    });
</script>