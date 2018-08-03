<?php

/**
    *Controlador de módulo adopciones
    *
    *@author Juan Manual Vargas Conejo
    *@version 1.0.0
    *@since Archivo disponible desde la versión 1.0.0
    *@deprecated Archivo no disponible a parteir de la versión 2.0.0
    */


class Adopciones extends CI_Controller
{
    
        function __construct() {
        parent::__construct();
        $this->load->model('mdl_Adopciones');
       
    }

    /**
        *Realiza el proceso de mostrar las adopciones
        */

    	public function listar()
        {
        $this->load->view('plantilla/header');
        $this->load->view('plantilla/nav');
        $data['adopciones'] = $this->mdl_Adopciones->listar();
        $this->load->view('front_end/vw_adopciones',$data); 
         $this->load->view('plantilla/footer');
    }


    public function agregarCarrito()
    {
        $idAdopcion = $this->input->post('idAdopcion');
        $adopciones = $this->mdl_Adopciones->porId($idAdopcion);
    

        foreach ($adopciones as $adopcion) {
            # code...
        

        $insert = array(
            'id'      => $adopcion->idAdopcion,
            'qty'     => 1,
            'price'   => 39.95,
            'name'    => 'T-Shirt',
            'imagenAdopcion' => $adopcion->imagenAdopcion,
            'nombreAdopcion' => $adopcion->nombreAdopcion,
            'generos_idGenero' => $adopcion->generos_idGenero
        );

        }


        if($idAdopcion = $adopcion->idAdopcion){

            echo "Ya tienes ese animal agragado men";

        }else{
            
        $this->cart->insert($insert);
        redirect('../index.php/MiControlador/index/5' , 'refresh');
        }

        


        
    }

     function eliminarProducto($rowid) 
    {
        //para eliminar un producto en especifico lo que hacemos es conseguir su id
        //y actualizarlo poniendo qty que es la cantidad a 0
        $insert = array(
            'rowid' => $rowid,
            'qty' => 0
        );
        //después simplemente utilizamos la función update de la librería cart
        //para actualizar el carrito pasando el array a actualizar
        $this->cart->update($insert);
        
        $this->session->set_flashdata('productoEliminado', 'El producto fue eliminado correctamente');
        redirect('../index.php/MiControlador/index/5', 'refresh');
    }
    
    function eliminarCarrito() {
        $this->cart->destroy();
        $this->session->set_flashdata('destruido', 'El carrito fue eliminado correctamente');
        redirect('../index.php/MiControlador/index/5', 'refresh');
    }


}