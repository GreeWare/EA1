<?php


/**
 * 
 */
class AdopcionesCrud extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('grocery_CRUD');
		
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

		//try {

			
			
		//} catch (Exception $e) {

			$crud->set_field_upload('imagenAdopcion', './img');
			
		//}

		
		 
		$output = $crud->render();

		$this->load->view('back_end/vw_adopcionesCRUD.php', (array)$output);


		
	}

		

}


?>