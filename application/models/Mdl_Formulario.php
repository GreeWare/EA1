<?php


class Mdl_Formulario extends CI_Model{

	function __construct(){
		parent::__construct(); 
	}

	function porId($idFormato) {
        //$this->db->where('idAdopcion', $idAdopcion);
        //$adopciones = $this->db->get('adopciones');
        return $this->db
        ->select("*") # También puedes poner * si quieres seleccionar todo
        ->from("formato")
        ->where('idFormato', $idFormato)
        ->get()
        ->result();
       // return $adopciones->result();
    }


    

}
