<?php


/**
 * 
 */
class HistoriasCrud extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('grocery_CRUD');
	}


	public function index() 
	{
		$crud = new grocery_CRUD();
		 
		
		$crud->set_table('historias');
		

		$campos = array(
			'idHistoria' => 'ID',
			'nombreHistoria' => 'Nombre',
			'descripcionHistoria' => 'Descripcion',
			'imagenHistoria' => 'Imagen', 
			'usuarios_idUsuarios' => 'Responsable'
		);

		$crud->required_fields('idHistoria','nombreHistoria','descripcionHistoria', 'imagenHistoria', 'usuarios_idUsuarios');


		$crud->display_as($campos);
		 
		$output = $crud->render();

		$this->load->view('back_end/vw_historiasCrud.php', (array)$output);


	}

		

}


?>