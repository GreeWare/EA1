<?php

/**
    *Controlador de módulo eventos
    *
    *@author Juan Manual Vargas Conejo
    *@version 1.0.0
    *@since Archivo disponible desde la versión 1.0.0
    *@deprecated Archivo no disponible a parteir de la versión 2.0.0
    */

class eventos extends CI_Controller
{
        function __construct() {
        parent::__construct();
        $this->load->model('mdl_Eventos');
    }



           /**
        *Realiza el proceso de mostrar los eventos
        */
    	public function listar(){
        $this->load->view('plantilla/header');
        $this->load->view('plantilla/nav');
        $data['eventos'] = $this->mdl_Eventos->listar();
        $this->load->view('vw_eventos',$data); 
         $this->load->view('plantilla/footer');
    }
}