<?php 

/**
    *Modelo del módulo Generos
    *
    *@author Juan Manuel Vargas Conejo
    *@version 1.0.0
    *@since Archivo disponible desde la versión 1.0.0
    *@deprecated Archivo no disponible a partir de la versión 2.0.0
    */

class Mdl_Generos extends CI_Model{

	function __construct(){
		parent::__construct(); 
	}


		/**
        *Realiza la consulta en la tabla "eventos" de la base de datos
        *Obtiene las filas de la consulta
        **/
	public function listar(){
		$gen = $this->db->get('generos'); 
		return $gen->result(); 
	}

}