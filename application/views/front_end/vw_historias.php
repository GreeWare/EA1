<section class="spacer bg3">
		<div class="container">
			<div class="row">
				<div class="span12 aligncenter flyLeft">
					<blockquote class="large">
						Sé parte de las historias felices
					</blockquote>
				</div>
				<div class="span12 aligncenter flyRight">
					<i class="icon-heart icon-10x"></i>
				</div>
			</div>
		</div>
	</section>




<!--comienzan las historias -->
	<section id="blog" class="section">
		<div class="container">
			<center><h2><strong>Adopta para que existan más historias así</strong> </h2></center>
			<br>

			<!-- 3 columnas -->
			<div class="row">

				<?php
				 /**
                *extrae todas las columnas de la tabla historias
                *
                */
              foreach($historias as $historia):
              ?>
				<div class="span6">
					<div class="home-post">
						<div class="post-image">
							<img  class="team-thumb" src="<?=base_url();?><?=$historia->imagenInicio;?>">
						</div>
						<div class="post-meta">
							<i class="icon-heart icon-2x"></i>
							<span class="date"><?=$historia->nombreHistoria;?></span>
							
						</div>
						<div class="entry-content">
							<h5><strong><a href="#">Conoce su historia</a></strong></h5>
							
								<h3><?=$historia->descripcionHistoria;?></h3>

						</div>
					</div>
				</div>

				<?php
            		endforeach;
            	?>

				</div>
			</div>
		</section>



				