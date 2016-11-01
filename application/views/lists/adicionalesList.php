<h5><strong>
	<?php
        if($expediente != null) {
            echo $visor->getEncabezado() . " para ";
            echo $expediente->definitivo == 1 ? "el expediente: " : "datos previos: ";
            echo $expediente->getEncabezado();
        } else {
            echo "No existe el expediente elegido";
        }
	?>
</strong></h5>

<div class="pull-right" style="margin:4px;">
<?php
echo Form::button( "volver", $controllerVolverLabel,
		array( 'onClick' => "javascript: location.href='" . Kohana::$base_url . Kohana::$index_file . "/$controllerVolver/'", 'class' => "btn"  ) );
echo Form::button( "Nuevo", "Nuevo", array( 'onClick' => "javascript: location.href='".$visor->getUrlNew()."/id=$idexpte'", 'class' => "btn btn-danger"  ) );
?>
</div>

<?php 
echo "<table class='table table-condensed table-bordered table-hover'>";

echo "<thead><tr class='bg-inverse'>";
foreach( $visor->getNombreColumnas() as $value ) {
	echo "<th>$value</th>";
}
echo "</tr></thead>";

//datos de la tabla.-
if( $visor->getListado() != null ) {
	foreach( $visor->getListado() as $key => $value ) {

        //$reparacionStr = $value->getReparacionStr();
        $permisoStr = $value->getPermisoStr();
        $adicionalStr = $value->getAdicionalStr();
        $aguaStr = $value->getAguaStr();
        $cloacaStr = $value->getCloacasStr();

        $aforos = $value->obtenerAforos();
        $aforosStr =   "Aforo de Permiso: " . $aforos->getValorPermiso()."<br>" .
            "Aforo de Adicionales: " . $aforos->getValorAdicional()."<br>" .
            "Aforo de Agua: " . $aforos->getValorAgua()."<br>" .
            "Aforo de Cloacas: " . $aforos->getValorCloaca();
        $aforosPopover = "<span class='glyphicon glyphicon-search pull-right ayuda' title='Aforos' " .
            "data-toggle='popover' data-placement='right' data-html='true' data-content='$aforosStr' > " .
            "</span>";

        $id = $value->pk();

		echo "<tr>";
        echo "<td>" . (strcmp("", $permisoStr) == 0 ? "<br>" : $permisoStr) . "</td>";
        echo "<td>" . (strcmp("", $adicionalStr) == 0 ? "<br>" : $adicionalStr) . "</td>";
        echo "<td>" . (strcmp("", $aguaStr) == 0 ? "<br>" : $aguaStr) . "</td>";
        echo "<td>" . (strcmp("", $cloacaStr) == 0 ? "<br>" : $cloacaStr) . "</td>";
		echo "<td>$value->numerorecibo</td>";
        echo "<td>" . $aforos->getTotal() . $aforosPopover . "</td>";

		echo "<td>" . $visor->getEditLink( $id ) . "</td>";
		echo "<td>" . $visor->getDeleteLink( $id ) . "</td>";
		echo "</tr>";
	}
}
echo "</table>";
?>
<script>
    $(document).ready(function() {
        $(".ayuda").popover();
    });
</script>