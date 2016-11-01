<?php
require_once 'application/classes/util/numberUtil.php';

function dibujarFila($detalleAforo) {
    $valorFila = 0;
    if($detalleAforo->getDerecho() != null) {
        $valorFila = $detalleAforo->getValor();
        $art = $detalleAforo->getDerecho()->Art;
        $inc = $detalleAforo->getDerecho()->Inc;
        $it = $detalleAforo->getDerecho()->It;
        $ap = $detalleAforo->getDerecho()->Ap;
        $destino = $detalleAforo->getDerecho()->Destino;
        $trabajo = "";

        if($detalleAforo->getTrabajo() != null) {
            $trabajo = $detalleAforo->getTrabajo()->nombretrabajo;
        }

        echo "<tr>";
        echo "<td>$art</td>";       //articulo
        echo "<td>$inc</td>";       //inciso
        echo "<td>$it</td>";        //item
        echo "<td>$ap</td>";        //apartado
        echo "<td>$destino</td>";   //concepto
        echo "<td class='text-right' >" . $detalleAforo->getPuntaje() . "</td>";  //puntaje
        echo "<td class='text-right' >" . $detalleAforo->getUnidad() . "</td>";     //cantidad
        echo "<td class='text-right' >" . $detalleAforo->getDimension() . "</td>";  //dimension
        echo "<td class='text-right' >" . getValor($valorFila) . "</td>";      //valor
        echo "<td>$trabajo</td>";                               //servicio
        echo "</tr>";
    }

    return $valorFila;
}

function dibujarRelevamiento($relevamiento) {
    $valorRelevamiento = 0;
    if($relevamiento != null) {
        $valorRelevamiento = $relevamiento->getValor();
        echo "<tr>";
        echo "<td><br></td>";
        echo "<td><br></td>";
        echo "<td><br></td>";
        echo "<td><br></td>";
        echo "<td>" . $relevamiento->getNombre() . "</td>";    //concepto: relevamiento
        echo "<td><br></td>";
        echo "<td class='text-right' >" . $relevamiento->getPorcentaje() . "</td>";  //porcentaje de relevamiento
        echo "<td class='text-right'>%</td>";
        echo "<td class='text-right' >" . getValor($valorRelevamiento) . "</td>";      //valor
        echo "<td><br></td>";
        echo "</tr>";
    }

    return $valorRelevamiento;
}

function dibujarFilaTotal($total) {
    echo "<tr>";
    echo "<td colspan='8' class='text-right' >Total $ </td>";
    echo "<td class='text-right' >".getValor($total)."</td>";
    echo "<td><br></td>";
    echo "</tr>";
}

function dibujarEncabezado($columnas) {
    echo "<thead>";
    echo "<tr class='bg-inverse'>";
    foreach( $columnas as $value ) {
        echo "<th>$value</th>";
    }
    echo "</tr>";
    echo "</thead>";
}

function getValor($valor) {
    return NumberUtil::format($valor == null ? 0 : $valor);
}
?>
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
if($expediente != null) {
    echo Form::button( "Nuevo", "Imprimir Aforo", array( 'onClick' => "javascript: location.href='".$visor->getUrlNew()."/id=$idexpte'", 'class' => "btn btn-danger"  ) );
}
?>
</div>

<?php
echo "<table class='table table-condensed table-bordered table-hover'>";
dibujarEncabezado($visor->getNombreColumnas());
echo "<tbody>";
$total = 0;
//obras solicitadas.-
if( $obrasSolicitadas != null ) {
	foreach( $obrasSolicitadas as $value ) {
        $aforos = $value->obtenerAforos();

        $total += dibujarFila($aforos->getObra());
        $total += dibujarRelevamiento($aforos->getRelevamientoObra());
        $total += dibujarFila($aforos->getBoca());
        $total += dibujarRelevamiento($aforos->getRelevamientoBoca());
        $total += dibujarFila($aforos->getRecinto());
        $total += dibujarRelevamiento($aforos->getRelevamientoRecinto());
	}
}
//adicionales de obra.-
if( $adicionales != null ) {
    foreach( $adicionales as $value ) {
        $aforos = $value->obtenerAforos();

        $total += dibujarFila($aforos->getPermiso());
        $total += dibujarFila($aforos->getAdicional());
        $total += dibujarFila($aforos->getAgua());
        $total += dibujarFila($aforos->getCloaca());
    }
}

dibujarFilaTotal($total);
echo "</tbody>";
echo "</table>";
?>
<script>
    $(document).ready(function() {
        $(".ayuda").popover();
    });
</script>