<?php
class User {
	private $mensajes;
    private $userLog;
    private $usuario;
    private $expediente;

    private static $instance;

    private function __construct() {
		$this->mensajes = "";
		$this->userLog = null;
		$this->usuario = null;
		$this->expediente = null;
	}

    public static function createInstance() {
        $c = __CLASS__;
        self::$instance = new $c;

        try {
            self::$instance->userLog = Auth::instance()->get_user();
            if( self::$instance->userLog ) {
                try {
                    self::$instance->usuario = ORM::factory( "usuario" )->getUsuarioFromUser(self::$instance->userLog->id);
                    if( is_null(self::$instance->usuario) ) {
                        self::$instance->mensajes = "El usuario no tiene una persona asociada";
                        self::$instance->usuario = null;
                        self::$instance->userLog = null;
                        self::$instance->expediente = null;
                    }
                } catch( Exception $e ) {
                    self::$instance->mensajes = $e;
                    self::$instance->usuario = null;
                    self::$instance->userLog = null;
                    self::$instance->expediente = null;
                }
            } else {
                self::$instance->mensajes = "El usuario no esta logueado";
                self::$instance->usuario = null;
                self::$instance->userLog = null;
                self::$instance->expediente = null;
            }
        } catch( Exception $e ) {
            echo "Exception al buscar el usuario: $e";
            self::$instance->mensajes = "Exception al buscar el usuario: " . $e;
            self::$instance->usuario = null;
            self::$instance->userLog = null;
            self::$instance->expediente = null;
        }
    }

	public static function getInstance() {
        $c = __CLASS__;
        //var_dump(self::$instance);
        self::$instance = new $c;
        //var_dump(self::$instance);

        try {
            self::$instance->userLog = Auth::instance()->get_user();
            if( self::$instance->userLog ) {
                $usuarios = ORM::factory( "usuario" )->where( "iduser", "=", self::$instance->userLog->id )->find_all();
                if( sizeof( $usuarios ) == 1 ) {
                    self::$instance->usuario = $usuarios[0];
                } else {
                    self::$instance->mensajes = "Mas de un Usuario con userid: " . self::$instance->userLog->id;
                    self::$instance->usuario = null;
                    self::$instance->userLog = null;
                    self::$instance->expediente = null;
                }
            } else {
                self::$instance->mensajes = "El usuario no esta logueado";
                self::$instance->usuario = null;
                self::$instance->userLog = null;
                self::$instance->expediente = null;
            }
        } catch( Exception $e ) {
            echo "Exception al buscar el usuario: $e";
            self::$instance->mensajes = "Exception al buscar el usuario: " . $e;
            self::$instance->usuario = null;
            self::$instance->userLog = null;
            self::$instance->expediente = null;
        }
        return self::$instance;
	}

	public static function deleteInstance() {
		self::$instance = null;
	}

	public function getMensajes() {
		return $this->mensajes;
	}
	public function getUserLog() {
		return $this->userLog;
	}
	public function getUsuario() {
		return $this->usuario;
	}
	public function getExpediente() {
		return $this->expediente;
	}
	public function addExpediente($idExpediente) {
        $expedienteValidado = null;
		if($idExpediente != null) {
			$expedienteValidado = ORM::factory("expedientes")->getExpediente($idExpediente);
		}
        $this->addExpedienteBase($expedienteValidado);
	}
    public function addExpedienteAdmin($idExpediente) {
        $expedienteAdmin = null;
        if($idExpediente != null) {
            $expedienteAdmin = ORM::factory("expedientes", $idExpediente);
        }
        $this->addExpedienteBase($expedienteAdmin);
    }
    private function addExpedienteBase($expediente) {
        $this->expediente = null;
        if($expediente != null) {
            $this->expediente = $expediente;
        }
    }

	public function removeExpediente() {
		$this->expediente = null;
	}
}
?>