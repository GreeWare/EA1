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
            $nombre = $this->input->post('name');
            $apellidoz = $this->input->post('apellidos');
            $phone = $this->input->post('telefono');
            $corr = $this->input->post('email');
            $pass = $this->input->post('contrasena');

            $this->form_validation->set_rules('name', 'Nombre', 'trim|required');
            $this->form_validation->set_rules('apellidos', 'Apellidos', 'trim|required');
            $this->form_validation->set_rules('telefono', 'TelefÃ³no', 'trim|required');
            $this->form_validation->set_rules('email', 'Correo', 'trim|required');
            $this->form_validation->set_rules('contrasena', 'ContraseÃ±a', 'trim|required');

            $this->form_validation->set_message('required', 'El campo %s es obligatorio');
            $this->form_validation->set_message('trim', 'El campo %s es obligatorio');

            if($this->form_validation->run()===FALSE)
            {

                $this->load->view('plantilla/nav');
                $this->load->view('plantilla/header');
                $this->load->view('front_end/vw_registro');
                $this->load->view('plantilla/footer');

            }else{

                $this->Mdl_Usuarios->setnombreUsuario($nombre);
                $this->Mdl_Usuarios->setapellidosUsuario($apellidoz);
                $this->Mdl_Usuarios->settelefonoUsuario($phone);
                $this->Mdl_Usuarios->setemailUsuario($corr);
                $this->Mdl_Usuarios->setcontraseñaUsuario($pass);

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
    	}

        /**
        *Realiza el proceso de iniciar una sesión
        */
    	public function login()
        {

            $corr2 = $this->input->post('email');
            $pass2 = $this->input->post('contrasena');

            $this->form_validation->set_rules('email', 'Correo', 'trim|required');
            $this->form_validation->set_rules('contrasena', 'ContraseÃ±a', 'trim|required');

            $this->form_validation->set_message('required', 'El campo %s es obligatorio');
            $this->form_validation->set_message('trim', 'El campo %s es obligatorio');

            if($this->form_validation->run()===FALSE)
            {

                $this->load->view('plantilla/nav');
                $this->load->view('plantilla/header');
                $this->load->view('front_end/vw_login');
                $this->load->view('plantilla/footer');   

            }else{

                $user_login= array(
                    'emailUsuario'=> $corr2,
                    'contraseñaUsuario'=> $pass2
                );

                $data= $this->Mdl_Usuarios->login($user_login['emailUsuario'],$user_login['contraseñaUsuario']);

                if($data)
                {
                    $usuario_data = array(
                        'idUsuarios'=> $data['idUsuarios'],
                        'nombreUsuario'=> $data['nombreUsuario'],
                        'apellidosUsuario'=> $data['apellidosUsuario'],
                        'telefonoUsuario'=> $data['telefonoUsuario'],
                        'emailUsuario'=> $data['emailUsuario'],
                        'contraseñaUsuario'=> $data['contraseñaUsuario'],
                        'estatususuarios_idEstatusUsuarios'=> $data['estatususuarios_idEstatusUsuarios']
                        /*
                        'idUsuario'=> $this->input->post('idUsuario'),
                        'nombreUsuario'=> $this->input->post('nombreUsuario'),
                        'apellidosUsuario'=> $this->input->post('apellidosUsuario'),
                        'telefonoUsuario'=> $this->input->post('telefonoUsuario'),
                        'emailUsuario'=> $this->input->post('emailUsuario'),
                        'contraseñaUsuario'=> $this->input->post('contraseñaUsuario')
                        */
                    );
                        
                    //Crea la sesión con los datos del array
                    //Redirecciona al perfil de usuario
                    $this->session->set_userdata($usuario_data);
                    redirect('MiControlador/index/5');
                    

                }else{

                    $Vnm['validar']= 0;
                    $this->load->view('plantilla/nav');
                    $this->load->view('plantilla/header');
                    $this->load->view('front_end/vw_login', $Vnm);
                    $this->load->view('plantilla/footer'); 
                    
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