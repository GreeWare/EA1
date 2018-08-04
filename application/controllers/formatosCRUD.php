<?php

/**
 * 
 */
class FormatosCrud extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('grocery_CRUD');
	}


	public function index() 
	{
		$crud = new grocery_CRUD();
		 
		
		$crud->set_table('formato');
		

		$campos = array(
			'idFormato' => 'ID',
			'calleFormato' => 'Calle',
			'coloniaFormato' => 'Colonia',
			'municipioFormato' => 'Formato', 
			'ciudadFormato' => 'Ciudad',
			'adopciones_idAdopcion' => 'Adoptado',
			'folio' => 'Folio',
			'nombreAdoptante' => 'Nombre del adoptante',
			'apellidoAdoptante' => 'Apellidos del adoptante',
			'telefonoAdoptante'  => 'Telefono del adoptante',
			'emailAdoptante' => 'Email adoptante'

		);

		$crud->required_fields('idFormato','calleFormato','coloniaFormato', 'municipioFormato', 'ciudadFormato',
			'adopciones_idAdopcion','folio','nombreAdoptante','apellidoAdoptante','telefonoAdoptante','emailAdoptante');


		$crud->display_as($campos);

		//$crud->set_field_upload('imagenHistoria','./img');
			
		 
		$output = $crud->render();

		$this->load->view('back_end/vw_formatosCRUD.php', (array)$output);


	}

		

}


?>