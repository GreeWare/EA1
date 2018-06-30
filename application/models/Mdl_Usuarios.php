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

		function __construct()
		{
			parent::__construct(); 
		}

        /**
        *Realiza la función de registrar los datos del usuario en la base de datos
        *
        *@param string $nombre; nombre del usuario
        *@param string $apellidos; apellidos del usuario
        *@param string $telefono; teléfono del usuario
        *@param string $email; correo electrónico del usuario
        *@param string $password; contraseña del usuario
        */
		public function save($nombre, $apellidos, $telefono, $email, $password)
        {

            //Envía el parámetro $email a la función “validarEmail” del mismo modelo.
            //Si $email es validado, realiza el proceso de registrar los datos del usuario en la base de datos
            //Si $email no es validado, retorna un valor 0. 
            
            //@return interger 0 si el email no es validado
            //@var array $data; datos del usuario para registrar en la base de datos
            //@var array $data2; datos de los privilegios del usuario
        	if($this->validarEmail($email) == 1)
        	{
        		return 0;
        	}else
        	{
                //En este proceso se encripta la contraseña en md5
                //Los datos son colocados en un array para ser registrados
                //Se obtiene el id del último registro en la tabla “usuarios”
                //Se registra con otro array el valor del privilegio del usuario y se envía el id obtenido para ser llave foránea
            
                //@return interger 1 si los datos fueron registrados en sus correspondientes tablas
        		$pass = md5($password);
	            $data = array(
	                'nombreUsuario'=>$nombre,
	                'apellidosUsuario'=>$apellidos,
	                'telefonoUsuario'=> $telefono,
	                'emailUsuario'=>$email,
	                'contraseñaUsuario'=>$pass
	            );
	            $this->db->insert('usuarios', $data);
	            $idU = $this->db->insert_id();
	            $data2 = array(
	            	'estatusUsuarioNormal'=>3,
	            	'usuarios_idUsuario'=>$idU
	            );
	            $this->db->insert('usuariosnormal', $data2);
	            return 1;
        	}

        }

        /**
        *Realiza la consulta en la tabla "usuarios" de la base de datos
        *Obtiene las filas de la consulta
        *
        *@var array que lamacena el email para realizar la consulta en la base de datos
        *@var String $ses; almacena los datos obtenidos de la consulta con el array
        *@var String $resultado; almacena en filas los datos obtenidos de la variable $ses
        *@return devuelve la variable $resultado
        */
        public function login($email)
        {
        	$data3 = array('emailUsuario'=>$email);
        	$this->db->where($data3);
        	$ses = $this->db->get('usuarios');
        	$resultado = $ses->row();
            return $resultado;
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
    	public function validarEmail($email){
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