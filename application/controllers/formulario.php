<?php

/**
    *Controlador de módulo adopciones
    *
    *@author Manuel Velázquez Martínez
    *@version 1.0.0
    *@since Archivo disponible desde la versión 1.0.0
    *@deprecated Archivo no disponible a parteir de la versión 2.0.0
    */


class Formulario extends CI_Controller
{

	 function __construct() {
       parent::__construct();
       $this->load->model('Mdl_Formulario');
       $this->load->model('Mdl_Adopciones');
       $this->load->model('Mdl_Usuarios');
        $this->load->library('html2pdf');
    }


    public function index(){
    	$this->load->view('plantilla/header');
    	$this->load->view('front_end/vw_formFormulario');	
        $this->load->view('plantilla/footer');
    }    
       

    public function saveForm(){

    	   $idUsuarios = $this->input->post('idUsuarios');
    	   $usuarios = $this->Mdl_Usuarios->porId($idUsuarios);

    	   $calle = $this->input->post('calle');
    	   $colonia = $this->input->post('colonia');
    	   $municipio = $this->input->post('municipio');
    	   $adopciones_idAdopcion = $this->input->post('adopciones_idAdopcion');


            foreach ($usuarios as $usuario) {
                $nombreAdoptante = $usuario->nombreUsuario;
                $apellidoAdoptante = $usuario->apellidosUsuario;
                $telefonoAdoptante = $usuario->telefonoUsuario;
                $emailAdoptante = $usuario->emailUsuario;
            }

    	 	

            $this->form_validation->set_rules('calle', 'Calle', 'trim|required');
            $this->form_validation->set_rules('colonia', 'Colonia', 'trim|required');
            $this->form_validation->set_rules('municipio', 'Municipio', 'trim|required');

            $this->form_validation->set_message('required', 'El campo %s es obligatorio');
            $this->form_validation->set_message('trim', 'No se permiten espacios en blanco en %s ');

            if($this->form_validation->run()===FALSE)
            {

                $this->load->view('plantilla/nav');
                $this->load->view('plantilla/header');
                $this->load->view('front_end/vw_formFormulario');
                $this->load->view('plantilla/footer');

            }else{

                $this->Mdl_Formulario->setcalleFormato($calle);
                $this->Mdl_Formulario->setcoloniaFormato($colonia);
                $this->Mdl_Formulario->setmunicipioFormato($municipio);
                $this->Mdl_Formulario->setadopciones_idAdopcion($adopciones_idAdopcion);
                $this->Mdl_Formulario->setfolioUsuarios($idUsuarios);
                $this->Mdl_Formulario->setnombreAdoptante($nombreAdoptante);
                $this->Mdl_Formulario->setapellidoAdoptante($apellidoAdoptante);
                $this->Mdl_Formulario->settelefonoAdoptante($telefonoAdoptante);
                $this->Mdl_Formulario->setemailAdoptante($emailAdoptante);
         

                
                $this->Mdl_Formulario->save();
                }//redirect(base_url().'index.php/formularios/index');




                 /*$data['formatos'] = $this->Mdl_Formulario->porId($idUsuarios);
                  $this->load->view('front_end/pdf', $data);      */


                  //establecemos la carpeta en la que queremos guardar los pdfs,
        //si no existen las creamos y damos permisos
        $this->createFolder();
 
        //importante el slash del final o no funcionará correctamente
        $this->html2pdf->folder('./files/pdfs/');
        
        //establecemos el nombre del archivo
        $this->html2pdf->filename('test.pdf');
        
        //establecemos el tipo de papel
        $this->html2pdf->paper('a4', 'portrait');
        
        //datos que queremos enviar a la vista, lo mismo de siempre
        /*$data = array(
            'title' => 'Listado de los animales adoptados',
            'adopciones' => $this->mdl_Adopciones->getAdopciones()
        );*/

        $data['formatos'] = $this->Mdl_Formulario->porId($idUsuarios);
        
        //hacemos que coja la vista como datos a imprimir
        //importante utf8_decode para mostrar bien las tildes, ñ y demás
        $this->html2pdf->html(utf8_decode($this->load->view('front_end/pdf', $data, true)));
        
        //si el pdf se guarda correctamente lo mostramos en pantalla
        if($this->html2pdf->create('save')) 
        {
            $this->show();
        }







            }










        private function createFolder()
    {
        if(!is_dir("./files"))
        {
            mkdir("./files", 0777);
            mkdir("./files/pdfs", 0777);
        }
    }
 
 
   
 
    //funcion que ejecuta la descarga del pdf
    public function downloadPdf()
    {
        //si existe el directorio
        if(is_dir("./files/pdfs"))
        {
            //ruta completa al archivo
            $route = base_url("files/pdfs/test.pdf"); 
            //nombre del archivo
            $filename = "test.pdf"; 
            //si existe el archivo empezamos la descarga del pdf
            if(file_exists("./files/pdfs/".$filename))
            {
                header("Cache-Control: public"); 
                header("Content-Description: File Transfer"); 
                header('Content-disposition: attachment; filename='.basename($route)); 
                header("Content-Type: application/pdf"); 
                header("Content-Transfer-Encoding: binary"); 
                header('Content-Length: '. filesize($route)); 
                readfile($route);
            }
        }    
    }
 
 
    //esta función muestra el pdf en el navegador siempre que existan
    //tanto la carpeta como el archivo pdf
    public function show()
    {
        if(is_dir("./files/pdfs"))
        {
            $filename = "test.pdf"; 
            $route = base_url("files/pdfs/test.pdf"); 
            if(file_exists("./files/pdfs/".$filename))
            {
                header('Content-type: application/pdf'); 
                readfile($route);
            }
        }
    }
    
    //función para crear y enviar el pdf por email
    //ejemplo de la libreria sin modificar
    public function mail_pdf()
    {
        
        //establecemos la carpeta en la que queremos guardar los pdfs,
        //si no existen las creamos y damos permisos
        $this->createFolder();
 
        //importante el slash del final o no funcionará correctamente
        $this->html2pdf->folder('./files/pdfs/');
        
        //establecemos el nombre del archivo
        $this->html2pdf->filename('test.pdf');
        
        //establecemos el tipo de papel
        $this->html2pdf->paper('a4', 'portrait');
        
        //datos que queremos enviar a la vista, lo mismo de siempre
        $data = array(
            'title' => 'Listado de las provincias españolas en pdf',
            'provincias' => $this->pdf_model->getProvincias()
        );
        
        //hacemos que coja la vista como datos a imprimir
        //importante utf8_decode para mostrar bien las tildes, ñ y demás
        $this->html2pdf->html(utf8_decode($this->load->view('pdf', $data, true)));
 
 
        //Check that the PDF was created before we send it
        if($path = $this->html2pdf->create('save')) 
        {
 
            $this->load->library('email');
 
            $this->email->from('your@example.com', 'Your Name');
            $this->email->to('israel965@yahoo.es'); 
            
            $this->email->subject('Email PDF Test');
            $this->email->message('Testing the email a freshly created PDF');    
 
            $this->email->attach($path);
 
            $this->email->send();
            
            echo "El email ha sido enviado correctamente";
                        
        }
        
    } 
























        }




