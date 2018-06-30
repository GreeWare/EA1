<?php 

/**
    *Modelo del módulo Eventos
    *
    *@author Joanna Elizabeth Guerrero Campos
    *@version 1.0.0
    *@since Archivo disponible desde la versión 1.0.0
    *@deprecated Archivo no disponible a partir de la versión 2.0.0
    */

class Mdl_Historias extends CI_Model{

	function __construct(){
		parent::__construct(); 
	}

	/**
        *Realiza la consulta en la tabla "historias" de la base de datos
        *Obtiene las filas de la consulta
        **/
	public function listar(){
		$his = $this->db->get('historias'); 
		return $his->result(); 
	}

}