<?php defined('SYSPATH') or die('No direct script access.');

require_once 'application/classes/util/controllerUtil.php';

class ControllerUtil {
    protected static $controllerNameBegin = "Controller_";

    public function getControllerName($nombreControladorParam) {
        $nombreControlador = "";
        if( $nombreControladorParam != null && strpos($nombreControladorParam, ControllerUtil::$controllerNameBegin) !== false ) {
            $nombreControlador = substr( $nombreControladorParam, strlen(ControllerUtil::$controllerNameBegin) );
        }
        return $nombreControlador;
    }
}