
    <!-- section: services -->
  <section id="services" class="section orange">
    <div class="container">
      <h4>Adopta uno sin casa!</h4>
      <!-- Four columns -->
      <div class="row">
          <div class="row"> 
            <h2>
              Los animalitos que veras aquí necesitan encontrar un hogar donde los traten con los cuidados y mucho amor.              <br>
              <br><strong>Dales la oportunidad de tener una familia!!</strong>
            </h2>
          </div>



            <?php

             /**
                *extrae todas las columnas de la tabla adopciones
                *
                */
              foreach($adopciones as $adopcion):
              ?>

              <?= form_open(base_url() . 'index.php/adopciones/agregarCarrito') ?>

        <div class="span4 animated-fast flyIn">
          <div class="service-box">

            <div id="imagenAdopcion">
              <img class="img-rounded" src="<?=base_url();?><?=$adopcion->imagenAdopcion;?>" />
            </div>

            <div id="nombreAdopcion">
              <h2><?=$adopcion->nombreAdopcion;?></h2>
            </div>
            
            
<!--hace que se oculte la información-->
<div class="col-xs-12 col-sm-12">
  <script type='text/JavaScript'>
    function blmostrocult(blconted) {
    var c=blconted.nextSibling;
    if(c.style.display=='none') {
    c.style.display='block';
   } else {
   c.style.display='none';
    }
    return false;
    }
   </script>

  <a onclick="return blmostrocult(this);" style="cursor: hand; cursor: pointer;" class="btn btn-success">Ver más</a><div class="col-xs-12 col-sm-12" style="display: none;"> 

    <div id="estatusadopciones_idEstatusAdopciones">
      <h3 align="justify"><?=$adopcion->tipoEstatusAdopcion;?></h3>
    </div>
    <div id="especies_idEspecie">
      <h3 align="justify">Especie: <?=$adopcion->nombreEspecie;?></h3>
    </div>
    <div id="generos_idGenero">
      <h3 align="justify">Genero: <?=$adopcion->nombreGenero;?></h3>
    </div>
    <div id="descripcionAdopcion">
      <h3 align="justify"><?=$adopcion->descripcionAdopcion;?></h3>
    </div>
   
    <?= form_hidden('idAdopcion', $adopcion->idAdopcion); ?>
    <?= form_submit('action', 'Agregar al carrito'); ?>
    <?= form_close() ?>
              <!--
              <p><?=$adopcion->descripcionAdopcion;?></p>
              <p><?=$adopcion->estatusAdopcion?></p>
              <!--<td><?=$adopcion->idUsuarioNormal;?></td>
              <p><?=$adopcion->generos_idGenero;?></p>-->
          </div>
           <br>
     
        </div>  

            </div>

          </div>
 
            <?php
            endforeach;
            ?>
        </div>
      </div>
  </section>


  <!-- end section: services -->








            