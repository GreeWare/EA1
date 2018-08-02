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

        private $_idUsuarios;
        private $_nombreUsuario;
        private $_apellidosUsuario;
        private $_telefonoUsuario;
        private $_emailUsuario;
        private $_contraseñaUsuario;
        private $_estatusUsuario_idEstatusUsuarios;

		function __construct()
		{
			parent::__construct(); 
		}

        public function getidUsuarios(){
            return $this->_idUsuarios;
        }

        public function setidUsuario($_idUsuarios){
            $this->_idUsuarios = $_idUsuarios;
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

        public function getestatusUsuarios_idEstatusUsuarios(){
            return $this->_estatusUsuarios_idEstatusUsuarios;
        }

        public function setestatusUsuarios_idEstatusUsuarios($_estatusUsuarios_idEstatusUsuarios){
             $this->_estatusUsuarios_idEstatusUsuarios = $_estatusUsuarios_idEstatusUsuarios;
        }


        /**
        *Realiza la función de registrar los datos del usuario en la base de datos
        */
		public function save()
        {

            $this->db->set('idUsuarios', 0)
                     ->set('nombreUsuario',$this->_nombreUsuario)
                     ->set('apellidosUsuario', $this->_apellidosUsuario)
                     ->set('telefonoUsuario', $this->_telefonoUsuario)
                     ->set('emailUsuario', $this->_emailUsuario)
                     ->set('contraseñaUsuario', "AES_ENCRYPT('{$this->_contraseñaUsuario}','{$this->_emailUsuario}')", FALSE)
                     ->set('estatusUsuarios_idEstatusUsuarios', 1);

            $this->db->insert('usuarios');

        }

        public function login($emailUsuario, $contraseñaUsuario)
        {
            $Llave = $this->db->select("AES_ENCRYPT('$contraseñaUsuario','$emailUsuario') as pass")
                              ->get();

            $miLlave = $Llave->result();

            foreach ($miLlave as $reg):
                $pass2 = $reg->pass;
            endforeach;

        	$datax = array(
                'emailUsuario'=> $emailUsuario,
                'contraseñaUsuario' => $pass2
            );

            $this->db->where($datax);

            if($query=$this->db->get('usuarios'))
            {
                return $query->row_array();
            }else{
                return false;
            }
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