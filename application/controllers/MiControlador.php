<?php

/**
    *Controlador de Inicio, filosofia, registro e ingresa
    *
    *@author Juan Manual Vargas Conejo
    *@version 1.0.0
    *@since Archivo disponible desde la versión 1.0.0
    *@deprecated Archivo no disponible a parteir de la versión 2.0.0
    */
defined('BASEPATH') OR exit('No direct script access allowed');

class MiControlador extends CI_Controller{

    function __construct() {
        parent::__construct();
      
         $this->load->model('mdl_Adopciones');
    }




    /**
        *Realiza el proceso de llamar a las vistas 
        */
	public function index($opcion = 1){
		//$data['name'] = "Juan";
		//$data['title'] = "Mi Controlador";
		
		//$data['title'] ="inicio";
		$this->load->view('plantilla/nav');
		

		$this->load->view('plantilla/header');
		
		switch ($opcion) {
			case 1:	$this->load->view('front_end/vw_inicio');
				break;
			case 2: $this->load->view('front_end/vw_filosofia');
				break;
			case 3:	$this->load->view('front_end/vw_registro');
				break;	
			case 4: $this->load->view('front_end/vw_login');
				break;	
			case 5: $this->load->view('front_end/vw_perfil');	
				break;
			case 6: $this->load->view('front_end/vw_donaciones');	
				break;
				
		
		}

		$this->load->view('plantilla/footer');
	
		}

		
    	


	}
	



