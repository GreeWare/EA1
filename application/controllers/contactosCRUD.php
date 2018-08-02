<?php


/**
 * 
 */
class ContactosCrud extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('grocery_CRUD');
		
	}


	public function index() 
	{
		$crud = new grocery_CRUD();
		 
		
		$crud->set_table('contactos');
		
		$campos = array(
			'idContacto' => 'ID',
			'telefonoContacto' => 'Telefono',
			'emailContacto' => 'Email',
			'imagenContacto' => 'Imagen',
			'usuarios_idUsuarios' => 'Usuario'
		);

		$crud->required_fields('idContacto','telefonoContacto','emailContacto',
		'imagenContacto',
		'usuarios_idUsuarios');


		$crud->display_as($campos);

		//try {

			
			
		//} catch (Exception $e) {
			$crud->set_field_upload('imagenContacto','./img');
			
		//}

		
		 
		$output = $crud->render();

		$this->load->view('back_end/vw_contactosCRUD.php', (array)$output);


		
	}

		

}


?>