
<section id="contact" class="section green">
    <div class="container">
         <div class="row">
            <div class="span12">
                <div class="home-post">
                   <center><h3>Inicia tu sesión  </h3></center> 
                    <div class="cform" id="contact-form">

                        <?php  

                                        /**
                                        *Muestra los mensajes de errores de la validación
                                        */
                                        echo validation_errors();
                
                                        /**
                                        *Valida si la vista recibió la variable $validar
                                        *Si $validar fue recibida mostrará el mensaje correspondiente
                                        */
                                        if(isset($validar))
                                        {
                                            echo 'Correo o contraseña incorrectos';
                                        }

                                    
                                    /**
                                    *Formulario que enviara los datos insertados de "email" y "contraseña" al controlador "usuarios"
                                    *Si los datos estan validados y son corectos, el controlador iniciará la sesión del suario
                                    */
                                    ?>

            <div class="span3 aligncenter">
                </div>

                        <div class="row">
                            <div class="span6 aligncenter">

                                <form action="<?php echo base_url().'index.php/usuarios/login';?>" method="post">
            
                                        <label>Correo Electrónico: </label><br>
                                        <input placeholder="Correo Electrónico" type="text" name="email"><br>
                                        <label>Contraseña: </label><br>
                                        <input placeholder="Contraseña" type="password" name="contrasena"><br>
                                        <button  type="submit" value="Registrar" class="btn btn-success">Ingresar</a>
                                        <!--<button type="submit">Ingresar</button>-->
                                </form>

                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>
</section>