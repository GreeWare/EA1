<?php


/**
 * 
 */
class adopcionesCrud extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('grocery_CRUD');
		$this->load->view('plantilla/nav');
		$this->load->view('plantilla/header');
	}


	public function index() 
	{
		$crud = new grocery_CRUD();
		 
		
		$crud->set_table('adopciones');
		

		$campos = array(
			'idAdopcion' => 'ID',
			'nombreAdopcion' => 'Nombre',
			'imagenAdopcion' => 'Imagen',
			'descripcionAdopcion' => 'Descripcion',
			'estatusAdopcion' => 'Estatus'
		);

		$crud->required_fields('idAdopcion','nombreAdopcion','imagenAdopcion','descripcionAdopcion',
		'estatusAdopcion');


		$crud->display_as($campos);
		$crud->set_field_upload('imagenAdopcion', '../EA1/');
		 
		$output = $crud->render();

		$this->load->view('front_end/vw_perfil.php', (array)$output);


		$this->load->view('plantilla/footer');
	}

		

}


?>