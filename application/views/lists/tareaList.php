<h5><strong><?php echo $visor->getEncabezado(); ?></strong></h5>

<div class="text-right" style="margin:4px;">
<?php
echo Form::button( "Nuevo", "Nuevo", array( 'onClick' => "javascript: location.href='" . $visor->getUrlNew() . "'", 'class' => "btn btn-danger"  ) );
?> 
</div>
<br/>
<?php 
echo "<table class='table table-condensed table-bordered table-hover'>";
echo "<thead>";
	echo "<tr class='bg-inverse'>";
	foreach( $visor->getNombreColumnas() as $key => $value ) {
		echo "<th>$value</th>";
	}
	echo "</tr>";
echo "</thead>";
echo "<tbody>";
	foreach( $visor->getListado() as $key => $value ) {
		$id = $value->pk();
        $claseFila = (
            $value->finalizada == 1 ? "success" : (
                $value->prioridad == 1 ? "info" : (
                    $value->prioridad == 2 ? "warning" : "danger"
                )
            )
        );
		echo "<tr class='$claseFila' >";
		echo "<td>$value->tema</td>";
		echo "<td>$value->descripcion</td>";
		echo "<td class='bool'>" . ($value->finalizada == 1 ? "Si" : "No") . "</td>";
		echo "<td>" . $value->getPrioridadStr() . "</td>";
        echo "<td>" . $visor->getEditLink($id) . "</td>";
		echo "<td>" . $visor->getDeleteLink($id) . "</td>";
        echo "</tr>";
	}
echo "</tbody>";
echo "</table>";
?>
