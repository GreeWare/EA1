<?php

/**
    *Controlador de generos
    *
    *@author Juan Manual Vargas Conejo
    *@version 1.0.0
    *@since Archivo disponible desde la versión 1.0.0
    *@deprecated Archivo no disponible a parteir de la versión 2.0.0
    */

class generos extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('mdl_Generos');
        
    }

    /**
        *Realiza el proceso de mostrar los generos
        */
    	public function listar(){
        $this->load->view('plantilla/header');
        $this->load->view('plantilla/nav');
        $data['generos'] = $this->mdl_Generos->listar();
        $this->load->view('vw_generos',$data); 
    }
}