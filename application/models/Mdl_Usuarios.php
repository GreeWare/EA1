<?php 

    /**
    *Modelo del módulo Usuarios
    *
    *@author Rogelio Almanza Herrejón
    *@version 1.0.0
    *@since Archivo disponible desde la versión 1.0.0
    *@deprecated Archivo no disponible a partir de la versión 2.0.0
    */
	class Mdl_Usuarios extends CI_Model
	{

        private $_idUsuario;
        private $_nombreUsuario;
        private $_apellidosUsuario;
        private $_telefonoUsuario;
        private $_emailUsuario;
        private $_contraseñaUsuario;

		function __construct()
		{
			parent::__construct(); 
		}

        public function getidUsuario(){
            return $this->_idUsuario;
        }

        public function setidUsuario($_idUsuario){
            $this->_idUsuario = $_idUsuario;
        }

        public function getnombreUsuario(){
            return $this->_nombreUsuario;
        }

        public function setnombreUsuario($_nombreUsuario){
            $this->_nombreUsuario = $_nombreUsuario;
        }

        public function getapellidosUsuario(){
            return $this->_apellidosUsuario;
        }

        public function setapellidosUsuario($_apellidosUsuario){
            $this->_apellidosUsuario = $_apellidosUsuario;
        }

        public function gettelefonoUsuario(){
            return $this->_telefonoUsuario;
        }

        public function settelefonoUsuario($_telefonoUsuario){
            $this->_telefonoUsuario = $_telefonoUsuario;
        }

        public function getemailUsuario(){
            return $this->_emailUsuario;
        }

        public function setemailUsuario($_emailUsuario){
            $this->_emailUsuario = $_emailUsuario;
        }

        public function getcontraseñaUsuario(){
            return $this->_contraseñaUsuario;
        }

        public function setcontraseñaUsuario($_contraseñaUsuario){
            $this->_contraseñaUsuario = $_contraseñaUsuario;
        }

        /**
        *Realiza la función de registrar los datos del usuario en la base de datos
        */
		public function save()
        {

            $this->db->set('idUsuario', 0)
                     ->set('nombreUsuario',$this->_nombreUsuario)
                     ->set('apellidosUsuario', $this->_apellidosUsuario)
                     ->set('telefonoUsuario', $this->_telefonoUsuario)
                     ->set('emailUsuario', $this->_emailUsuario)
                     ->set('contraseñaUsuario', "AES_ENCRYPT('{$this->_nombreUsuario}','{$this->_contraseñaUsuario}')", FALSE);

            $this->db->insert('usuarios');

        }

        public function login($emailUsuario, $contraseñaUsuario)
        {

            $Llave = $this->db->select("$emailUsuario, AES_ENCRYPT('$contraseñaUsuario') as pass");

            $miLlave = $Llave->result();

            foreach ($miLlave as $reg):
                $pass2 = $reg->pass;
            endforeach;

        	$data = array(
                'emailUsuario'=> $emailUsuario,
                'contraseñaUsuario' => $pass2
            );

            $this->db->where($data);

            if($query=$this->db->get('usuarios'))
            {
                return $query->row_array();
            }else{
                return false;
            }
        }

        /**
        *Realiza la función de validar los datos para crear una sesión
        *
        *@param String $email; email ingresado en el formulario
        *@param String $password; contraseña ingresada en el formulario
        *@var array de los datos enviados del formulario
        *@var String $usu; almacena los datos obtenidos de la consulta con el array
        *@return devulve la cantidad de filas almacenadas en la variable $usu
        */
        public function validarLogin($email, $password)
    	{
			$pass = md5($password);

			$dato = array('emailUsuario'=>$email, 'contraseñaUsuario'=>$pass);
			$this->db->where($dato);
			$usu = $this->db->get('usuarios');
			return $usu->num_rows();
    	}

        /**
        *Realiza la validación del email si está registrado en la base de datos
        *
        *@return 0 si el email no está registrado
        *@return 1 si el email si está registrado
        *@var array del emial para realizar la consulta
        */
    	public function email_check($email){
            $Vmail = array('emailUsuario'=>$email);
        	$this->db->where($Vmail);
        	$Xmail = $this->db->get('usuarios');

            if($Xmail->num_rows() == 0)
            {
            	return 0;
            }else{
            	return 1;
            }
        }

	}

?>