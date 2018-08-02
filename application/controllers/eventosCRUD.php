<?php


/**
 * 
 */
class EventosCrud extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('grocery_CRUD');
		
	}


	public function index() 
	{
		$crud = new grocery_CRUD();
		 
		
		$crud->set_table('eventos');
		

		$campos = array(
			'idEventos' => 'ID',
			'imagenEvento' => 'Imagen',
			'nombreEvento' => 'Nombre',
			'lugarEvento' => 'Lugar',
			'fechaEvento' => 'Fecha',
			'descripcionEvento' => 'Descripcion',
			'usuarios_idUsuarios' => 'Usuario'
		);

		$crud->required_fields('idEventos','imagenEvento','nombreEvento','lugarEvento',
		'fechaEvento',
		'descripcionEvento',
		'usuarios_idUsuarios'
		);


		$crud->display_as($campos);

		//try {

			
			
		//} catch (Exception $e) {

			$crud->set_field_upload('imagenEvento','./img');
			
		//}

		
		 
		$output = $crud->render();

		$this->load->view('back_end/vw_eventosCRUD.php', (array)$output);


		
	}

		

}


?>