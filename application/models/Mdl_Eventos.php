<?php 

/**
    *Modelo del módulo Eventos
    *
    *@author Juan Manual Vargas Conejo
    *@version 1.0.0
    *@since Archivo disponible desde la versión 1.0.0
    *@deprecated Archivo no disponible a partir de la versión 2.0.0
    */
class Mdl_Eventos extends CI_Model{

	function __construct(){
		parent::__construct(); 
	}

/**
        *Realiza la consulta en la tabla "eventos" de la base de datos
        *Obtiene las filas de la consulta
        **/
	public function listar(){
		$eve = $this->db->get('eventos'); 
		return $eve->result(); 
	}

}