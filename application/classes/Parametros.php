<?php
class Parametros
{
	public static $params = "id";

	public static function getValueFromParam( $parametros, $param )
	{
		$value = null;

		if( $parametros != null && strcasecmp( trim( $parametros ), "" ) != 0 &&
			$param != null && strcasecmp( trim( $param ), "" ) != 0 )
		{
			if( strpos( $parametros, $param ) !== false )
			{
				$parametrosParseados = explode( "&", $parametros );
				if( $parametrosParseados != null && sizeof( $parametrosParseados ) > 0 )
				{
					foreach( $parametrosParseados as $paramValues )
					{
						$paramValue = explode( "=", $paramValues );
						if( strcasecmp( $paramValue[0], $param ) == 0 )
						{
							$value = $paramValue[1];
							break;
						}
					}
				}
			}
		} 

		return $value;
	}

	/**
	 * Defines los nombres y valores para el estado activo/inactivo.
	 *
	 * 
	 * @param   long   genero: 1 -> femenino, otro -> masculino
	 * @return  array
	 */
	public static function getEstados( $genero )
	{
		if( $genero == 1 )
		{
			return array( 1 => "Activa", 0 => "Inactiva" );
		}
		else
		{
			return array( 1 => "Activo", 0 => "Inactivo" );
		}
	}

	/**
	 * Defines el nombre de un determinado estado.
	 *
	 * @param   long   valor: 1 -> activo/a, 0 -> inactivo/a
	 * @param   long   genero: 1 -> femenino, otro -> masculino
	 * @return  array
	 */
	public static function getEstadoStr( $valor, $genero )
	{
		if( $valor == 0 )
		{
			return $genero == 1 ? "Inactiva" : "Inactivo";
		}
		else if( $valor == 1 )
		{
			return $genero == 1 ? "Activa" : "Activo";
		}
		else
		{
			return null;
		}
	}

	public static function getMoneda()
	{
		return "$";
	}
}
?>