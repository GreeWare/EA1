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
                $Vc['NoR']= 0;
                $this->load->view('plantilla/nav');
                $this->load->view('plantilla/header');
                $this->load->view('front_end/vw_login', $Vc);
                $this->load->view('plantilla/footer');
            }else{
                $Vc['YaR']= 0;
                $this->load->view('plantilla/nav');
                $this->load->view('plantilla/header');
                $this->load->view('front_end/vw_registro', $Vc);
                $this->load->view('plantilla/footer');
            }
            
    	}

        /**
        *Realiza el proceso de iniciar una sesión
        */
    	public function login()
    	{
            $user_login= array(
                'emailUsuario'=>$this->input->post('email'),
                'contraseñaUsuario'=>$this->input->('contraseña')
            );

            $data= $this->Mdl_Usuarios->login($user_login['emailUsuario'],$user_login['contraseñaUsuario']);

            if($data){
                $this->Mdl_Usuarios->setnombreUsuario($this->input->post('name'));
                $this->Mdl_Usuarios->setapellidosUsuario($this->input->post('apellidos'));
                $this->Mdl_Usuarios->settelefonoUsuario($this->input->post('telefono'));
                $this->Mdl_Usuarios->setemailUsuario($this->input->post('email'));
                $this->Mdl_Usuarios->setcontraseñaUsuario($this->input->post('contraseña'));
                redirect('MiControlador/index/1');
            }
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