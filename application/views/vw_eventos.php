  <!-- section: services -->
  <section id="services" class="section orange">
    <div class="container">
      <h4>Proximos Eventos</h4>
      <!-- Four columns -->
      <div class="row">
          <div class="row"> 
            <h2>
              Ven y asiste a nuestros próximos eventos!<br>
              <br>
              En ellos podrás ver a los animalitos que tenemos en adopción o dejar tu donativo para esta noble causa.

            <br>
            </h2>
          </div>
            <?php

            /**
                *extrae todas las columnas de la tabla eventos
                *
                */
              foreach($eventos as $evento):
              ?>
          <div class="span6 animated-fast flyIn">
             <div class="home-post">
              <img  class="img-rounded" src="<?=base_url();?><?=$evento->imagenEvento;?>"  />
              <br>
              <h1><strong><?=$evento->nombreEvento;?></strong></h1>
              <br>
                    <div class="entry-content">
          
                  <h3 align="justify">Lugar: <?=$evento->lugarEvento;?></h3>
                  <h3 align="justify">Fecha: <?=$evento->fechaEvento;?></h3>
                  <h3 align="justify"><?=$evento->descripcionEvento;?></h3>
                    </div>
               
            </div>
          </div>
          <br>
            <?php
            endforeach;
            ?>

        </div>
      </div>
  </section>
