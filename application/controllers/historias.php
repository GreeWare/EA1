<?php


    /**
    *Controlador del módulo Historias
    *
    *@author Joanna Elizabeth Guerrero Campos
    *@version 1.0.0
    *@since Archivo disponible desde la versión 1.0.0
    *@deprecated Archivo no disponible a parteir de la versión 2.0.0
    */
defined('BASEPATH') OR exit('No direct script access allowed');


class Historias extends CI_Controller
{
        function __construct() {
        parent::__construct();
        $this->load->model('mdl_Historias');
    }

     /**
        *Realiza el proceso de mostrar las historias
        */
    	public function listar(){
        
		$this->load->view('plantilla/header');
        $this->load->view('plantilla/nav');
        $data['historias'] = $this->mdl_Historias->listar();
        $this->load->view('front_end/vw_historias',$data); 
        $this->load->view('plantilla/footer');
    }
}		