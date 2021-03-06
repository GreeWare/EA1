<?php
 /**
    *Controlador del módulo Contactos
    *
    *@author Joanna Elizabeth Guerrero Campos
    *@version 1.0.0
    *@since Archivo disponible desde la versión 1.0.0
    *@deprecated Archivo no disponible a parteir de la versión 2.0.0
    */

class Contactos extends CI_Controller
{
        function __construct() {
        parent::__construct();
        $this->load->model('mdl_Contactos');
    }

    /**
        *Realiza el proceso de mostrar los contactos
        */

    	public function listar(){
        $this->load->view('plantilla/header');
        $this->load->view('plantilla/nav');
        $data['contactos'] = $this->mdl_Contactos->listar();
        $this->load->view('front_end/vw_contactos',$data); 
        $this->load->view('plantilla/footer');
    }
}