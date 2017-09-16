<section id="contact-page">
    <div class="container">
        <div class="center">        
            <h2>Añadie Viajes</h2>
            <p class="lead">Ultimo viaje agregado.</p>
        </div> 
        <div class="row contact-wrap"> 
            <div class="status alert alert-success" style="display: none"></div>
            <?php
            $travel = $_SESSION['idviaje'];
            $msage = $_SESSION['msje'];

            foreach ($travel as $indice => $valor) {
                if ($indice == 'tipo') {
                    echo "<br><b>Tipo:</b><br>";
                    $tipo = $travel['interests'];
                    foreach ($tipo as $indice => $valor) {
                        echo "<b>---> $indice</b>: $valor<br>";
                    }
                } else {
                    echo "<br><b>$indice</b>: $valor";
                }
            }
            echo "<br>" . "<b style='color:green'>" . $msage;
            ?>
        </div><!--/.row-->
    </div><!--/.container-->
</section><!--/#contact-page-->