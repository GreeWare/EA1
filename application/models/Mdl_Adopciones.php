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
	return $this->db
        ->select("*") # También puedes poner * si quieres seleccionar todo
        ->from("adopciones")
        ->join("generos", "generos.idGenero = adopciones.generos_idGenero")
        ->join("especies", "especies.idEspecie = adopciones.especies_idEspecie")
        ->join("estatusadopciones", "estatusadopciones.idEstatusAdopciones = adopciones.estatusAdopciones_idEstatusAdopciones")
        ->get()
        ->result();
	}


    function porId($idAdopcion) {
        //$this->db->where('idAdopcion', $idAdopcion);
        //$adopciones = $this->db->get('adopciones');
        return $this->db
        ->select("*") # También puedes poner * si quieres seleccionar todo
        ->from("adopciones")
        ->where('idAdopcion', $idAdopcion)
        ->join("generos", "generos.idGenero = adopciones.generos_idGenero")
        ->get()
        ->result();
       // return $adopciones->result();
    }

}