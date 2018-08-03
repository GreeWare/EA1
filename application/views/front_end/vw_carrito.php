<section id="services" class="section orange">
    <div class="container">
      <h4>Mi Carrito</h4>
      <div class="row">
      <div class="span12">
          <div class="home-post">
                  <center><label>Nombre: <?php echo $this->session->userdata('nombreUsuario'). "<br>";?></label><br>



                  
                  
      
                    <table width="100%" style="text-align: center">
                        <tr>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Genero</th>
                            <th>Eliminar</th>
                        </tr>

                   <?php $i = 1; ?>
                    <?php foreach ($this->cart->contents() as $items): ?>



                    <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
                   
                        <tr>
                            <td><img width="200px" src="<?=base_url()?>img/<?=$items['imagenAdopcion']?>"/></td>
                            <td><?=$items['nombreAdopcion']?></td>
                            <td><?=$items['generos_idGenero']?></td>
                            <!--creamos el enlace para eliminar el producto
                            pulsado pasando el rowid del producto-->
                            <td id="eliminar"><?= anchor('../index.php/adopciones/eliminarProducto/' . $items['rowid'], 'Eliminar') ?></td>
                        </tr>

                       <?php $i++ ?>

                        <?php endforeach; ?>

                        <tr id="total">
                          <!--creamos un enlace para eliminar el carrito-->
                          <td colspan="4" id="eliminarCarrito" style="text-align: right;"><button class="btn-warning" style="margin-right: 4%;"><?= anchor('../index.php/adopciones/eliminarCarrito', 'Vaciar carrito')?></button></td>
                        </tr>
                    </table>
                    
            <!--fin de nuestro carrito-->
                  <a class="btn btn-danger" href="<?php echo base_url()?>index.php/usuarios/logout">Cerrar Sesión</a></center>
        </div>
      </div>
      </div>
    </div>
</section>