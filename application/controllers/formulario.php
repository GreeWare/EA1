<?php

/**
    *Controlador de módulo adopciones
    *
    *@author Manuel Velázquez Martínez
    *@version 1.0.0
    *@since Archivo disponible desde la versión 1.0.0
    *@deprecated Archivo no disponible a parteir de la versión 2.0.0
    */


class Formulario extends CI_Controller
{

	 function __construct() {
       parent::__construct();
       $this->load->model('Mdl_Formulario');
       $this->load->model('Mdl_Adopciones');
       $this->load->model('Mdl_Usuarios');
    }


    public function index(){
    	$this->load->view('plantilla/header');
    	$this->load->view('front_end/vw_formFormulario');	
        $this->load->view('plantilla/footer');
    }


    public function saveForm(){

    	   $idUsuarios = $this->input->post('idUsuarios');
    	   $usuarios = $this->Mdl_Usuarios->porId($idUsuarios);

    	   $calle = $this->input->post('calle');
    	   $colonia = $this->input->post('colonia');
    	   $municipio = $this->input->post('municipio');
    	   $adopciones_idAdopcion = $this->input->post('adopciones_idAdopcion');


            foreach ($usuarios as $usuario) {
                $nombreAdoptante = $usuario->nombreUsuario;
                $apellidoAdoptante = $usuario->apellidosUsuario;
                $telefonoAdoptante = $usuario->telefonoUsuario;
                $emailAdoptante = $usuario->emailUsuario;
            }

    	 	

            $this->form_validation->set_rules('calle', 'Calle', 'trim|required');
            $this->form_validation->set_rules('colonia', 'Colonia', 'trim|required');
            $this->form_validation->set_rules('municipio', 'Municipio', 'trim|required');

            $this->form_validation->set_message('required', 'El campo %s es obligatorio');
            $this->form_validation->set_message('trim', 'No se permiten espacios en blanco en %s ');

            if($this->form_validation->run()===FALSE)
            {

                $this->load->view('plantilla/nav');
                $this->load->view('plantilla/header');
                $this->load->view('front_end/vw_formFormulario');
                $this->load->view('plantilla/footer');

            }else{

                $this->Mdl_Formulario->setcalleFormato($calle);
                $this->Mdl_Formulario->setcoloniaFormato($colonia);
                $this->Mdl_Formulario->setmunicipioFormato($municipio);
                $this->Mdl_Formulario->setadopciones_idAdopcion($adopciones_idAdopcion);
                $this->Mdl_Formulario->setfolioUsuarios($idUsuarios);
                $this->Mdl_Formulario->setnombreAdoptante($nombreAdoptante);
                $this->Mdl_Formulario->setapellidoAdoptante($apellidoAdoptante);
                $this->Mdl_Formulario->settelefonoAdoptante($telefonoAdoptante);
                $this->Mdl_Formulario->setemailAdoptante($emailAdoptante);
         

                
                $this->Mdl_Formulario->save();
                redirect(base_url().'index.php/Adopciones/listar');
               
                
            }
    }





}