<div id="wrapper">

<section id="one" class="wrapper style2 spotlights">
                <section>
                    <div class="content">
                        <div class="inner">
                            <h2>Lista de generos</h2>
         
    <table>
            <thead>
            <tr>
                <th>Identificador</th>
                <th>Nombre</th>
               
            </tr>
            </thead>
        <?php
        foreach($generos as $genero):
        ?>
            <tbody>
                <tr>
                    <td><?=$genero->idGenero;?></td>
                    <td><?=$genero->nombreGenero;?></td>
                    
                </tr>
            </tbody>
            <?php
        endforeach;
    ?>
    </table>

      
                </div>
            </div>
        </section>
    </section>
</div>
