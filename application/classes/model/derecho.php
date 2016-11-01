<?php defined('SYSPATH') or die('No direct script access.');
require_once 'application/classes/model/modelo.php';
/**
 *
 */
//// Importante el nombre de nuestra  clase debe de llevar la siguiente sintaxis
////  Model_<Nombre_de_la_tabla>
class Model_Derecho extends Modelo {

	protected $_table_names_plural = false;
/// Ojo con esto este campo es true por default pero hace que Kohana maneje a su gusto
/// Los nombres de la tablas agregándole "s" o "es" a las mismas
/// Es decir trata de pluralizar el nombre automáticamente, puede que sea muy útil
/// Pero en lo personal no me gusta prefiero yo usar lo nombres a mi gusto
/// Por ello con esta indicaci�n le decimos a kohana:
/// "Deja el nombre de la tabla como se llama la clase y no le hagas cambios"

	protected $_primary_key = 'idderecho';      // default: id

	protected $_sorting  = array( 'Destino' => 'ASC', 'puntajeinferior' => 'ASC', 'puntajesuperior' => 'ASC' );

    public function getDerechoPorDestino($destino, $puntaje) {
        $derechoPorDestino = null;

        $derechos = $this->getDerechosPorDestino($destino);
        if(sizeof($derechos) > 0) {
            if(sizeof($derechos) == 1) {
                $derechoPorDestino = $derechos[0];
            }else{
                for($i = 0; $i < sizeof($derechos) && $derechoPorDestino == null; $i++){
                    $derecho = $derechos[$i];
                    if( ($puntaje == null) ||
                        (
                            ($derecho->puntajeinferior == null || $puntaje >= $derecho->puntajeinferior) &&
                            ($derecho->puntajesuperior == null || $puntaje <= $derecho->puntajesuperior)
                        )
                    ) {
                        $derechoPorDestino = $derecho;
                    }
                }
            }
        }

        return $derechoPorDestino;
    }

    private function getDerechosPorDestino($destino) {
        return ORM::factory($this->_table_name)
            ->where("Destino", "=", $destino)
            ->find_all();
    }
}
?>