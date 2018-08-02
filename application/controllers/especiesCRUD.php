<?php


/**
 * 
 */
class EspeciesCrud extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('grocery_CRUD');
		
	}


	public function index() 
	{
		$crud = new grocery_CRUD();

		$crud->set_table('especies');
		
		$campos = array(
			'idEspecie' => 'ID',
			'nombreEspecie' => 'Nombre'
		);

		$crud->required_fields('idEspecie','nombreEspecie');


		$crud->display_as($campos);

		//try {

			
			
		//} catch (Exception $e) {
			//$crud->set_field_upload('imagenContacto','./img');
			
		//}

			$output = $crud->render();

		$this->load->view('back_end/vw_especiesCRUD.php', (array)$output);


		
	}

		

}


?>