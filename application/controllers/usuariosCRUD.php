<?php


/**
 * 
 */
class UsuariosCrud extends CI_Controller
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
		 
		
		$crud->set_table('usuarios');
		

		$campos = array(
			'idUsuarios' => 'ID',
			'nombreUsuario' => 'Nombre',
			'apellidoUsuario' => 'Apellido',
			'telefonoUsuario' => 'Telefono',
			'emailUsuario' => 'Email',
			'estatususuarios_idEstatusUsuarios' => 'Estatus'
		);

		$crud->required_fields('idUsuarios','nombreUsuario','apellidoUsuario','telefonoUsuario',
		'emailUsuario',
		'estatususuarios_idEstatusUsuarios');


		$crud->display_as($campos);

		//try {

			
			
		//} catch (Exception $e) {

			//$crud->set_field_upload('imagenAdopcion', 'img/../');
			
		//}

		
		 
		$output = $crud->render();

		$this->load->view('back_end/vw_adopcionesCRUD.php', (array)$output);


		$this->load->view('plantilla/footer');
	}

		

}


?>