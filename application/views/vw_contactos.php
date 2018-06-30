 <!-- section: services -->
  <section id="services" class="section orange">
    <div class="container">
      <h4>Contáctanos</h4>
      <!-- Four columns -->
      <div class="row">
         
            <?php
            /**
                *extrae todas las columnas de la tabla contactos
                *
                */

              foreach($contactos as $contacto):
              ?>
        <div class="span6 animated-fast flyIn">
          <div class="">
            <center><img  class="team-thumb img-circle" src="<?=base_url();?><?=$contacto->imagenContacto;?>" />
            
             <h3><?=$contacto->telefonoContacto;?></h3>
              <h3><?=$contacto->emailContacto;?></h3></center>
             
              <!--<td><?=$adopcion->idUsuarioNormal;?></td>
              <p><?=$adopcion->generos_idGenero;?></p>-->
              </div>
          </div>
            <?php
            endforeach;
            ?>

        </div>
      </div>
  </section>