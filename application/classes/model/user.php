<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_User extends Model_Auth_User {
	private $errores = array();
	private $ok = false;

	public function addError( $error ) {
		if( !is_null( $error ) && strcmp( "", $error ) != 0 ) {
			if( is_null( $this->errores ) ) {
				$this->errores = array();
			}

			$this->errores[ sizeof( $this->errores ) ] = $error;
		}
	}

    public function getLastLoginStr() {
        $lastLoginStr = "No Usado";

        if(!is_null($this->last_login)){
            $lastLoginStr = Date::fuzzy_span($this->last_login);;
        }

        return $lastLoginStr;
    }

    public function getPersona(){
        $persona = ORM::factory( "usuario" )->getUsuarioFromUser($this->pk());

        return $persona;
    }

	public function getErrores() {
		return $this->errores;
	}

	public function ok() {
		$this->ok = true;
	}
	public function noOk() {
		$this->ok = false;
	}
	public function esOk() {
		return $this->ok;
	}
}