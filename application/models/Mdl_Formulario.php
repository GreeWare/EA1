<?php


class Mdl_Formulario extends CI_Model{

	private $_idFormato;
	private $_calleFormato;
	private $_coloniaFormato;
	private $_municipioFormato;
	private $_adopciones_idAdopcion;
	private $_folioUsuarios;
	private $_nombreAdoptante;
	private $_apellidoAdoptante;
	private $_telefonoAdoptante;
	private $_emailAdoptante;


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


    


	public function getidFormato(){
    	return $this->_idFormato;
    }

    public function setidFormato($_idFormato){
    	$this->_idFormato = $_idFormato;
    }

    public function getcalleFormato(){
    	return $this->_calleFormato;
    }

    public function setcalleFormato($_calleFormato){
    	$this->_calleFormato = $_calleFormato;
    }

    public function getcoloniaFormato(){
    	return $this->_coloniaFormato;
    }

    public function setcoloniaFormato($_coloniaFormato){
    	$this->_coloniaFormato = $_coloniaFormato;
    }
    
    public function getmunicipioFormato(){
    	return $this->_municipioFormato;
    }

    public function setmunicipioFormato($_municipioFormato){
    	$this->_municipioFormato = $_municipioFormato;
    }

    public function getadopciones_idAdopcion(){
    	return $this->_adopciones_idAdopcion;
    }

    public function setadopciones_idAdopcion($_adopciones_idAdopcion){
    	$this->_adopciones_idAdopcion = $_adopciones_idAdopcion;
    }
    
    public function getfolioUsuarios(){
    	return $this->_folioUsuarios;
    }

    public function setfolioUsuarios($_folioUsuarios){
    	$this->_folioUsuarios = $_folioUsuarios;
    }
    
    public function getnombreAdoptante(){
    	return $this->_nombreAdoptante;
    }

    public function setnombreAdoptante($_nombreAdoptante){
    	$this->_nombreAdoptante = $_nombreAdoptante;
    }

    public function getapellidoAdoptante(){
    	return $this->_apellidoAdoptante;
    }

    public function setapellidoAdoptante($_apellidoAdoptante){
    	$this->_apellidoAdoptante = $_apellidoAdoptante;
    }

    public function gettelefonoAdoptante(){
    	return $this->_telefonoAdoptante;
    }

    public function settelefonoAdoptante($_telefonoAdoptante){
    	$this->_telefonoAdoptante = $_telefonoAdoptante;
    }

    public function getemailAdoptante(){
    	return $this->_emailAdoptante;
    }

    public function setemailAdoptante($_emailAdoptante){
    	$this->_emailAdoptante = $_emailAdoptante;
    }
    

	public function save()
        {

            $this->db->set('idFormato', 0)
                     ->set('calleFormato',$this->_calleFormato)
                     ->set('coloniaFormato', $this->_coloniaFormato)
                     ->set('municipioFormato', $this->_municipioFormato)
                     ->set('adopciones_idAdopcion', $this->_adopciones_idAdopcion)
                     ->set('folioUsuarios', $this->_folioUsuarios)
                     ->set('nombreAdoptante', $this->_nombreAdoptante)
                     ->set('apellidoAdoptante', $this->_apellidoAdoptante)
                     ->set('telefonoAdoptante', $this->_telefonoAdoptante)
                     ->set('emailAdoptante', $this->_emailAdoptante);

            $this->db->insert('formato');

        }


}
