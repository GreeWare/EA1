<?php
/**
 * Vista de la sección de donaciones
 *
 * Se muestra un interfaz donde se encuentra un boton que redireccionará a la pagina de paypal donde se 
 * podrá realizar una donación a la Asociación
 *
 *
 * @author: Manuel Velázquez Martínez
 * @version    1.0.0 
 * @since      Archivo disponible desde la versión 1.0.0
 * @deprecated Archivo no disponible desde la versión 2.0.0
*/
?>


<div class="container" style="margin-top: 50px">
	<div class="span12">
	<div class="span8">
	<h1>Ayuda a salvar una vida</h1>
		<p><strong>Esperanza animal es una asociación creada por gente que ama a los animales, no depende del gobierno</strong></p>


		<div style="text-align: center;">	

			<h1 class="animated infinite shake">Donación por Paypal, tarjeta de credito o debito</h1>
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="Z732G64LEN49G">
				<button class="btn btn-theme " type="submit" border="0" alt="PayPal, la forma más segura y rápida de pagar en línea." style=" font-size: 20px"><strong>Donar</strong></button>
				<img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
				</form>


		</div>
	</div>
	<div class="span3">
		<h1>Gracias por tu aportación</h1>
		<img src="<?=base_url();?>img/logo.fw.png">
	</div>
</div>

</div>