/**
 * Controlador de las donaciones
 *
 * 
 *
 * @author: Manuel Velázquez Martínez
 * @version    1.0.0 
 * @since      Clase disponible de la versión 1.0.0
 * @deprecated Clase no disponible desde la versión 2.0.0
 */


<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Donaciones extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->view('plantilla/header');
        $this->load->view('plantilla/nav');
        $this->load->view('vw_donaciones',$data);
        $this->load->model('mdl_Usuario');
        $this->load->model('mdl_Donaciones');
    }
}
	

		


	
	



