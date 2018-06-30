<?php 

 /**
    *Modelo del módulo Adopciones
    *
    *@author Juan Manuel Vargas Conejo
    *@version 1.0.0
    *@since Archivo disponible desde la versión 1.0.0
    *@deprecated Archivo no disponible a partir de la versión 2.0.0
    */

class Mdl_Adopciones extends CI_Model{

	function __construct(){
		parent::__construct(); 
	}

	
	/**
        *Realiza la consulta en la tabla "adopciones" de la base de datos
        *Obtiene las filas de la consulta
        **/

	public function listar(){
		$adop = $this->db->get('adopciones');
		return $adop->result(); 
	}



}