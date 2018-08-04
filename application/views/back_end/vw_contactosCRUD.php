<?php 
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>

  <?php  

                           
                            ?>
                       


              
                       <div> 

                           <?=$output;?>

                       </div>




<?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>





     <a class="boton" href="http://localhost/EA1/index.php/cpanel">Cpanel</a></center>

<style type="text/css">
  .boton{
    text-decoration: none;
    padding: 10px;
    font-weight: 600;
    font-size: 20px;
    color: #ffffff;
    background-color: #1883ba;
    border-radius: 6px;
    border: 2px solid #0016b0;
  }
</style>