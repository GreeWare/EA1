<?php

class Cpanel extends CI_Controller{

	public function index(){
		//$data['name'] = "Juan";
		//$data['title'] = "Mi Controlador";
		$this->load->view('back_end/vw_cpanel');
		$this->load->view('plantillaBack/nav');
		$this->load->view('plantillaBack/header');
		$this->load->view('plantillaBack/footer');

	}

}