
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
        <div class="span4 animated-fast flyIn">
          <div class="service-box">
            <img  class="img-rounded" src="<?=base_url();?><?=$adopcion->imagenAdopcion;?>" />

            <h2><?=$adopcion->nombreAdopcion;?></h2>
            
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

   <h3 align="justify"><?=$adopcion->descripcionAdopcion;?></h3>
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




            