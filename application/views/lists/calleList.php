<h5><strong><?php echo $visor->getEncabezado(); ?></strong></h5>

<div class="text-right" style="margin:4px;">
<?php
echo $visor->getVolverButton(null, "/Zona/index/id=$iddistrito");
echo $visor->getNewButton(null, "/id=$idzona");
?>
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
        echo "<td>$value->nombre</td>";
        echo "<td>" . $visor->getEditLink( $id ) . "</td>";
        echo "<td>" . $visor->getDeleteLink( $id ) . "</td>";
        echo "</tr>";
    }
echo "</table>";
?>