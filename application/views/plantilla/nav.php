    <div class="navbar-wrapper">
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <!-- Responsive navbar -->
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
        </a>
         <a href="<?=base_url();?>index.php/MiControlador/index/1"><img src="<?=base_url();?>img/logo.fw.png" width="300" height="300"alt="" /></a>
          <!-- navigation -->
          <nav class="pull-right nav-collapse collapse">
            <ul id="menu-main" class="nav">

             <li class="nav-item  px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="<?=base_url();?>index.php/MiControlador/index/1">Inicio
                <span class="sr-only"></span>
              </a>
            </li>

              <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded"  href="<?=base_url().'index.php/Historias/listar';?>">Historias</a>
            </li> 
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded"  href="<?=base_url().'index.php/Adopciones/listar';?>">Adopciones</a>
            </li>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="<?=base_url().'index.php/MiControlador/index/6';?>">Donaciones</a>
            </li>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="<?=base_url().'index.php/Eventos/listar';?>">Eventos</a>
            <?php if($this->session->has_userdata('idUsuarios')){ ?>
                <li class="nav-item px-lg-4">
                  <a class="nav-link text-uppercase text-expanded" href="<?=base_url().'index.php/MiControlador/index/5';?>">Perfil</a>
                </li>
              <?php }else{ ?>
                <li class="nav-item px-lg-4">
                  <a class="nav-link text-uppercase text-expanded"  href="<?=base_url().'index.php/MiControlador/index/3';?>">Regístrate</a>
                </li>
                <li class="nav-item px-lg-4">
                  <a class="nav-link text-uppercase text-expanded" href="<?=base_url().'index.php/MiControlador/index/4';?>">Ingresa</a>
                </li>
              <?php } ?>
             
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>


<body>
  <!-- navbar -->
  
  <!-- Header area -->
  



