<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

    /**
    *Controlador del módulo Usuarios
    *
    *@author Rogelio Almanza Herrejón
    *@version 1.0.0
    *@since Archivo disponible desde la versión 1.0.0
    *@deprecated Archivo no disponible a parteir de la versión 2.0.0
    */
	class Usuarios extends CI_Controller
	{

		function __construct() {
	        parent::__construct();
	        $this->load->model('Mdl_Usuarios');
            $this->load->library('session');

    	}

        /**
        *Realiza el proceso de registrar un nuevo usuario
        */
    	public function save()
    	{

            $this->Mdl_Usuarios->setnombreUsuario($this->input->post('name'));
            $this->Mdl_Usuarios->setapellidosUsuario($this->input->post('apellidos'));
            $this->Mdl_Usuarios->settelefonoUsuario($this->input->post('telefono'));
            $this->Mdl_Usuarios->setemailUsuario($this->input->post('email'));
            $this->Mdl_Usuarios->setcontraseñaUsuario($this->input->post('contraseña'));

            $email_check=$this->Mdl_Usuarios->email_check($this->Mdl_Usuarios->getemailUsuario());

            if($email_check == 0){
                $this->Mdl_Usuarios->save();
                $result='Registro satisfactorio';
                redirect('MiControlador/index/4');
            }else{
                $result='Ya hay una cuenta relacionada con el correo introducido';
                redirect('MiControlador/index/3');
            }
            
    	}

        /**
        *Realiza el proceso de iniciar una sesión
        */
    	public function login()
    	{
            //Valida la información recibida del formulario de login mediante post

    		$email = $this->input->post('email');
    		$password = $this->input->post('contrasena');

    		$this->form_validation->set_rules('email', 'Correo', 'trim|required');
    		$this->form_validation->set_rules('contrasena', 'Contraseña', 'trim|required');

    		$this->form_validation->set_message('required', 'El campo %s es obligatorio');
    		$this->form_validation->set_message('trim', 'El campo %s es obligatorio');

            //Si los datos son validados, envía los datos como parámetros a la función “validarLogin” al modelo “Mdl_Usuarios”
            //Si los datos no son validados, regresa al formulario de login con los mensajes de errores correspondientes

    		if($this->form_validation->run()===FALSE)
    		{

    			$this->load->view('plantilla/nav');
				$this->load->view('plantilla/header');
				$this->load->view('front_end/vw_login');
				$this->load->view('plantilla/footer');

    		}else
    		{
                $ver= $this->Mdl_Usuarios->validarLogin($email, $password);
    			
                //Valida si $email y $password se encuentran registrados en la base de datos
                //Si no están registrados, regresa al formulario de login con la variable $Vc para mostrar el mensaje de error en el login
                //Si están registrados, envía $email a la función login del modelo “Mdl_Usuarios” para obtener los datos correspondientes del usuario con la variable $xar.
                
                //@var array $Vc que envia 0 para mostrar el error en le formulario de login
                //@var array $usuario_data almacena los datos obtenidos de la consulta con la variable $xar
                //@param String $xar; envía al método "Login" del modelo "Mdl_Usuarios"

                if($ver == 0){
                    $Vc['validar']= 0;
                    $this->load->view('plantilla/nav');
                    $this->load->view('plantilla/header');
                    $this->load->view('front_end/vw_login', $Vc);
                    $this->load->view('plantilla/footer');
                }else{
                    $xar= $this->Mdl_Usuarios->login($email);
                    $usuario_data = array(
                        'idUsuario'=> $xar->idUsuario,
                        'nombreUsuario'=> $xar->nombreUsuario,
                        'apellidosUsuario'=> $xar->apellidosUsuario,
                        'telefonoUsuario'=> $xar->telefonoUsuario,
                        'emailUsuario'=> $xar->emailUsuario,
                        'contraseñaUsuario'=> $xar->contraseñaUsuario
                    );
                    
                    //Crea la sesión con los datos del array
                    //Redirecciona al perfil de usuario
                    $this->session->set_userdata($usuario_data);
                    redirect('AdopcionesCrud/index');
                }
    		}
    	}

        /**
        *Realiza la función de cerrar una sesión
        *Regresa a la página de inicio del sitio web
        */
    	public function logout(){
    		$this->session->sess_destroy();
    		redirect('MiControlador/index/1');
    	}

	}

?>