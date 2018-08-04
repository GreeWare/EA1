<!-- section: contact -->
    <section id="contact" class="section green">
        <div class="container">
            <center><h3 style="font-size: 30px; ">Formulario</h3></center>
            <h3><strong><center>
               LLena los datos faltantes en el formulario
            </center></h3></strong>

            <div class="row">
                <div class="span12 ">
                    <div class="home-post">
                     <div class="cform " id="contact-form" >


            <div class="blankdivider30">
            </div>

                 
                <div class="span3 aligncenter">
                </div>
            
                <div class="row">
                    <div class="span6 aligncenter">
                   
                        <form action="<?php echo base_url().'index.php/usuarios/save';?>" method="post">


                              <?php $i = 1; ?>
                    <?php foreach ($this->cart->contents() as $items): ?>



                    <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
                            $items['idAdopcion']
                            <img width="200px" src="<?=base_url()?>img/<?=$items['imagenAdopcion']?>"/>
                                <div class="field your-name form-group">
                                        <input type="text" class="form-control" placeholder="<?=$items['nombreAdopcion']?>" data-rule="minlen:4" data-msg="Introduzca 4 letras mínimo" readonly="readonly"/>
                                    </div>
                                    <div class="field your-name form-group">
                                        <input type="text" class="form-control" placeholder="<?=$items['generos_idGenero']?>" data-rule="minlen:4" data-msg="Introduzca 4 letras mínimo" readonly="readonly"/>
                                    </div>
                                    
                       <?php $i++ ?>

                        <?php endforeach; ?>

                                    <div class="field your-name form-group">
                                        <input type="text" name="calle" class="form-control" placeholder="Dirección" data-rule="minlen:4" data-msg="Introduzca 4 letras mínimo" />
                                        <div class="validation"></div>
                                    </div>
                                    <div class="field your-name form-group">
                                        <input type="text" name="colonia" class="form-control" placeholder="Colonia" data-rule="minlen:4" data-msg="Introduzca 4 letras mínimo" />
                                        <div class="validation"></div>
                                    </div>
                                    <div class="field your-name form-group">
                                        <input type="text" name="municipio" class="form-control" placeholder="Municipio" data-rule="minlen:10" data-msg="Introduzca 4 letras mínimo" />
                                        <div class="validation"></div>
                                    </div>
                                    <div class="field your-email form-group">
                                        <input type="text" class="form-control" name="ciudad" placeholder="Ciudad" data-rule="minlen:4" data-msg="Introduzca 4 letras mínimo" />
                                        <div class="validation"></div>
                                    </div>
                                    
                             
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