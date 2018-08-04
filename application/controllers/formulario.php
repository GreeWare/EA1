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
       $this->load->model('mdl_Adopciones');
    }


    public function index(){
    	$this->load->view('plantilla/header');
    	$this->load->view('front_end/vw_formFormulario');	
        $this->load->view('plantilla/footer');
    }






}