
<!-- section: contact -->
    <section id="contact" class="section green">
        <div class="container">
            <h4>Regístrate</h4>
            <h3><strong><center>
               Para adoptar y hacer un donativo primero debes registrate
            </center></h3></strong>

            <div class="row">
                <div class="span12 ">
                    <div class="home-post">
                     <div class="cform " id="contact-form" >

            <?php 

                /**
                *Muestra los mensajes de error de la validación
                */
                echo validation_errors();
                
                /**
                *Valida si la vista recibió la variable $mail
                *si $mail fue recibida mostrará el mensaje de error correspondiente
                */
                if(isset($mail))
                {
                    echo 'Ya existe una cuenta con el correo insertado.';
                }

            /**
            *Formulario que enviará los datos ingresados al controlador "usuarios"
            *El controlador "usuarios" validará los datos recibidos del formulario
            *Si los datos son validados se registrarán en la base de datos para crear el nuevo usuario
            */
            ?>
            <div class="blankdivider30">
            </div>

                 
                <div class="span3 aligncenter">
                </div>
            
                <div class="row">
                    <div class="span6 aligncenter">
                   
                        <form action="<?php echo base_url().'index.php/usuarios/save';?>" method="post">
                           
                                    <div class="field your-name form-group">
                                        <input type="text" name="name" class="form-control" placeholder="Nombre(s)" data-rule="minlen:4" data-msg="Introduzca 4 letras mínimo" />
                                        <div class="validation"></div>
                                    </div>
                                    <div class="field your-name form-group">
                                        <input type="text" name="apellidos" class="form-control" placeholder="Apellidos(s)" data-rule="minlen:4" data-msg="Introduzca 4 letras mínimo" />
                                        <div class="validation"></div>
                                    </div>
                                    <div class="field your-name form-group">
                                        <input type="text" name="telefono" class="form-control" placeholder="Teléfono" data-rule="minlen:10" data-msg="Introduzca número de teléfono sin lada" />
                                        <div class="validation"></div>
                                    </div>
                                    <div class="field your-email form-group">
                                        <input type="text" class="form-control" name="email" id="email" placeholder="Correo" data-rule="email" data-msg="Introduzca un correo electrónico valido" />
                                        <div class="validation"></div>
                                    </div>
                                    <div class="field subject form-group">
                                        <input type="password" class="form-control" name="contrasena"  id="pass" placeholder="Contraseña" data-rule="minlen:8" data-msg="Introduzca 8 letras mínimo" />
                                        <div class="validation"></div>
                                    </div>

                                    <!--<a href="#" value="Registrar" class="btn btn-success">Registrar</a>
                                    <input type="submit" value="Registrar">
                                -->
                                    <button  type="submit" value="Registrar" class="btn btn-success">Registrar</a>
                                    
                  </div>
                </div>

                        </form>
                    </div>
                </div>
            </div>
                <!-- ./span12 -->
            </div>
        </div>
    </section>