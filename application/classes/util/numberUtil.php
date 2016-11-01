<?php defined('SYSPATH') or die('No direct script access.');

class NumberUtil
{
	public static $separadorDecimales = ",";
	public static $separadorMiles = ".";
	public static $decimales = 2;

    public static function formatDecimales( $valor, $cantidadDecimales ) {
		return number_format( $valor, $cantidadDecimales, NumberUtil::$separadorDecimales, NumberUtil::$separadorMiles );
	}

	public static function format( $valor ) {
		return NumberUtil::formatDecimales( $valor, NumberUtil::$decimales);
	}

    public static function formatFloat( $valor ) {
        return floatval(NumberUtil::format($valor));
    }
}
