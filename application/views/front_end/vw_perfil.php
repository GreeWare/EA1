<?php 
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>


<section id="services" class="section orange">
    <div class="container">
         <h4>Mi perfil</h4>
            <div class="row">
            <div class="span12">
                <div class="home-post">

                        <?php  

                            /**
                            *Muestra el nombre del usuario de la sesión iniciada
                            */
                            ?>
                        <center><label>Nombre: <?php echo $this->session->userdata('nombreUsuario'). "<br>";?></label><br>


              
                       <div> 

                           <?=$output;?>

                       </div>

                        
                                
                        


                        <a class="btn btn-danger" href="<?php echo base_url()?>index.php/usuarios/logout">Cerrar Sesión</a></center>




              </div>
            
        </div>
    </div>
    </div>
</section>


<?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>