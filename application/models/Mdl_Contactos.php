<?php 

/**
    *Modelo del módulo Adopciones
    *
    *@author Joanna Elizabeth Guerrero Campos
    *@version 1.0.0
    *@since Archivo disponible desde la versión 1.0.0
    *@deprecated Archivo no disponible a partir de la versión 2.0.0
    */

class Mdl_Contactos extends CI_Model{

	function __construct(){
		parent::__construct(); 
	}


/**
        *Realiza la consulta en la tabla "contactos" de la base de datos
        *Obtiene las filas de la consulta
        **/
	public function listar(){
		$con = $this->db->get('contactos'); 
		return $con->result(); 
	}

	

}