<?php

/**
    *Controlador de módulo adopciones
    *
    *@author Juan Manual Vargas Conejo
    *@version 1.0.0
    *@since Archivo disponible desde la versión 1.0.0
    *@deprecated Archivo no disponible a parteir de la versión 2.0.0
    */


class adopciones extends CI_Controller
{
    
        function __construct() {
        parent::__construct();
        $this->load->model('mdl_Adopciones');
       
    }

    /**
        *Realiza el proceso de mostrar las adopciones
        */

    	public function listar()
        {
        $this->load->view('plantilla/header');
        $this->load->view('plantilla/nav');
        $data['adopciones'] = $this->mdl_Adopciones->listar();
        $this->load->view('front_end/vw_adopciones',$data); 
         $this->load->view('plantilla/footer');
    }



    


    }