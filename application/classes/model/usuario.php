<?php defined('SYSPATH') or die('No direct script access.');
require_once 'application/classes/model/modelo.php';
/**
 *
 */
//// Importante el nombre de nuestra  clase debe de llevar la siguiente sintaxis
////  Model_<Nombre_de_la_tabla>
class Model_Usuario extends Modelo
{
	public $esRol = 0;
	public $esUsuario = 1;

	protected $_table_names_plural = false;
/// Ojo con esto este campo es true por default pero hace que Kohana maneje a su gusto
/// Los nombres de la tablas agregándole "s" o "es" a las mismas
/// Es decir trata de pluralizar el nombre automáticamente, puede que sea muy útil
/// Pero en lo personal no me gusta prefiero yo usar lo nombres a mi gusto
/// Por ello con esta indicación le decimos a kohana:
/// "Deja el nombre de la tabla como se llama la clase y no le hagas cambios"

	protected $_primary_key = 'idusuario';      // default: id

	protected $_sorting  = array( 'apellido' => 'ASC', 'nombre' => 'ASC' );

	protected $_belongs_to = array(
		'rol' => array(
			'model' => 'Usuario',
			'foreign_key' => 'idrol' ),
		'user' => array(
			'model' => 'user',
			'foreign_key' => 'iduser' )
	);

	protected $_has_many =
		array( 'permisos' => array(
			'model' => 'permiso',
			'foreign_key' => 'idusuario'
		)
	);

	public function delete() {
		$objeto = ORM::factory( $this->_table_name, $this->idusuario );

		$objeto->habilitado = 0;

		$objeto->save();
	}

    public function getUsuarioFromUser($iduser) {
        $usuario = null;

        $usuarios = ORM::factory( "usuario" )->where( "iduser", "=", $iduser )->find_all();
        if( sizeof( $usuarios ) > 0 ) {
            if( sizeof( $usuarios ) == 1 ) {
                $usuario = $usuarios[0];
            } else {
                throw new Exception( "Mas de un Usuario con userid: '$iduser'");
            }
        }

        return $usuario;
    }

    public function getFullName() {
        $apellido = "";
        $nombre = "";

        if(!is_null($this->apellido) && !empty($this->apellido)){
            $apellido = $this->apellido;
        }
        if(!is_null($this->nombre) && !empty($this->nombre)){
            $nombre = $this->nombre;
        }
        $fullName = $apellido . (!empty($apellido) && !empty($nombre) ? ", " : "") . $nombre;

        return $fullName;
    }

	/**
	 * Si tiene rol y el rol est� habilitado -> retorna el idrol.-
	 * Si no tiene rol -> retorna el idusuario.-
	 * 
	 * @return NULL
	 */
	public function getIdUsuarioParaPermisos() {
		$idParaPermisos = null;
	
		$idParaPermisos = $this->idusuario;	//por defecto, busca los permisos del usuario.-
		//si tiene rol, buscamos los permisos del rol.-
		if( !is_null( $this->idrol ) ) {
			$idParaPermisos = ( $this->rol->habilitado == 1 ) ? $this->idrol : null;
		}
	
		return $idParaPermisos;
	}

	public function obtenerPermisos() {
		$permisos = null;

		$idusuario = $this->getIdUsuarioParaPermisos();
		if( !is_null( $idusuario ) ) {
			$permisos = ORM::factory( "permiso" )->where( "idusuario", "=", $idusuario )->find_all();
		}

		return $permisos;
	}

	public function obtenerMenuesNoAsignados() {
		$menus = ORM::factory( "menu" );
		$permisos = $this->obtenerPermisos();
		if( sizeof( $permisos ) > 0 ) {
			$idmenus = array( sizeof( $permisos ) );
			for( $i = 0; $i < sizeof( $permisos ); $i++ ) {
				$idmenus[ $i ] = $permisos[ $i ]->idmenu;
			}
			$menus = $menus->where( "idmenu", "NOT IN", $idmenus );
		}

		return $menus->find_all();
	}

	public function obtenerRoles()
	{
		return $this->obtenerUsuariosFiltrados( $this->esRol, null );
	}

	public function obtenerUsuarios()
	{
		return $this->obtenerUsuariosFiltrados( $this->esUsuario, null );
	}

	public function obtenerRolesHabilitados()
	{
		return $this->obtenerUsuariosFiltrados( $this->esRol, 1 );
	}

	public function tienePermisoAdministracion() {
		$tienePermisoAdministracion = false;
		$idusuario = $this->idusuario;	//por defecto, busca los permisos del usuario.-
		//si tiene rol, buscamos los permisos del rol.-
		if( !is_null( $this->idrol ) ) {
			$idusuario = ( $this->rol->habilitado == 1 ) ? $this->idrol : null;
		}
		if( !is_null( $idusuario ) ) {
			$menu = ORM::factory( "menu" )->where( "url", "=", "Administracion" )->and_where( "visible", "=", "0" )->find_all();
			if( sizeof( $menu ) == 1 ) {
				$permisos = ORM::factory( "permiso" )->where( "idmenu", "=", $menu[ 0 ]->idmenu )->and_where( "idusuario", "=", $idusuario )->find_all();
				if( sizeof( $permisos ) == 1 ) {
					$tienePermisoAdministracion = true;
				}
			}
		}

		return $tienePermisoAdministracion;
	}

	private function obtenerUsuariosFiltrados( $tipo = null, $habilitado = null )
	{
		$yaTieneWhere = false; 
		$usuarios = ORM::factory( "usuario" );

		//si tenemos que filtrar por tipo de usuario...
		if( !is_null($tipo) ) {
			$usuarios = $usuarios->where( "tipousuario", "=", $tipo );
			$yaTieneWhere = true;
		}

		//si tenemos que filtrar por habilitado...
		if( !is_null($habilitado) ) {
			if( $yaTieneWhere ) {
				$usuarios = $usuarios->and_where( "habilitado", "=", $habilitado );
			} else {
				$usuarios = $usuarios->where( "habilitado", "=", $habilitado );
				$yaTieneWhere = true;
			}
		}

		return $usuarios->find_all();
	}
}
?>