<section id="contact-page">
<div class="container">
    <div class="center">        
        <h2>Añadir Viaje    </h2>
        <p class="lead">Rellene el siguiente formulario para agregar un nuevo viaje al sistema.</p>
    </div> 
    <div class="row contact-wrap"> 
        <div class="status alert alert-success" style="display: none"></div>
        <form id="form" method="post" action="index.php?module=travels">
            <table>
            <td>
                <div class="form-group">
                <label>ID VIAJE *</label>
                   <input size="15" name="idviaje" type="text" placeholder="Introduce el ID del viaje" class="form-control" value="<?php 	
                   if (!isset($error['idviaje'])) {
                            echo $_POST ? $_POST['idviaje'] : "";
                        }
                        ?>" >
                         <div id="e_idviaje"><?php
                            if (isset($error['idviaje'])) {
                                print ("<BR><span style='color: #ff0000'>" . "* " . $error['idviaje'] . "</span><br/>");
                            }
                            ?></div>
               </div>
                <div class="form-group">
                    <label>Destino *</label>
                    <select name="destino" id="destino" class="form-control">
                        <option value="" selected>Seleccione el Destino</option>
                        <option value="España" <?php if($_POST['destino']==="España") echo 'selected'?>>España</option>
                        <option value="Francia" <?php if($_POST['destino']==="Francia") echo 'selected'?>>Francia</option>
                        <option value="Portugal" <?php if($_POST['destino']==="Portugal") echo 'selected'?>>Portugal</option>
                        <option value="Andorra" <?php if($_POST['destino']==="Andorra") echo 'selected'?>>Andorra</option>
                        <option value="Argentina" <?php if($_POST['destino']==="Argentina") echo 'selected'?>>Argentina</option>
                        <option value="Bélgica" <?php if($_POST['destino']==="Bélgica") echo 'selected'?>>Bélgica</option>
                        <option value="China" <?php if($_POST['destino']==="China") echo 'selected'?>>China</option>
                    </select>
                    <div id="e_destino"><?php
                            if (isset($error['destino'])) {
                                print ("<BR><span style='color: #ff0000'>" . "* " . $error['destino'] . "</span><br/>");
                            }
                            ?></div>
                </div>
                <div class="form-group">
                    <label>Precio *</label>
                    <input size="30" maxlength="4" type='number' min="70" max="4000" name="precio" class="form-control" placeholder="€" value="<?php 
                    if (!isset($error['precio'])) {
                            echo $_POST ? $_POST['precio'] : "";
                        }
                        ?>" >
                         <div id="e_precio"><?php
                            if (isset($error['precio'])) {
                                print ("<BR><span style='color: #ff0000'>" . "* " . $error['precio'] . "</span><br/>");
                            }
                            ?></div>      
                </div>
                <div class="form-group">
                    <label>Oferta</label>
                    <input name="oferta" id="oferta" type="radio" <?php if (isset($oferta) && $oferta=="No")?> value="No" checked>NO
                    <input name="oferta" id="oferta" type="radio" <?php if (isset($oferta) && $oferta=="Si")?> value="Si">SI
                </div>
            </td>
            <td style="padding-left:30px">
                <div class="form-group">
                <label>Tipo *</label>
                <input name="tipo[]" id="tipo[]" type="checkbox" value="Crucero">Crucero
                <input name="tipo[]" id="tipo[]" type="checkbox" value="Tour">Tour
                <input name="tipo[]" id="tipo[]" type="checkbox" value="Visita Guiada">Visita
                <div id="e_tipo"><?php
                            if (isset($error['tipo'])) {
                                print ("<BR><span style='color: #ff0000'>" . "* " . $error['tipo'] . "</span><br/>");
                            }
                            ?></div>    
            </div>
            <div class="form-group">
                <label>Fecha de Salida *</label>
                <input type="text" name= "f_sal" id="f_sal" class="form-control" placeholder="mm/dd/yyyy" value="<?php 
                if (!isset($error['f_sal'])) {
                    echo $_POST ? $_POST['f_sal'] : "";
                }
                ?>">
                <div id="e_f_sal"><?php
                    if (isset($error['f_sal'])) {
                        print ("<BR><span style='color: #ff0000'>" . "* " . $error['f_sal'] . "</span><br/>");
                    }
                    ?></div>
            </div>
            <div class="form-group">
                <label>Fecha de Vuelta *</label>
                <input type="text" name= "f_lleg" id="f_lleg" class="form-control" placeholder="mm/dd/yyyy"  value="<?php 
                if (!isset($error['f_lleg'])) {
                            echo $_POST ? $_POST['f_lleg'] : "";
                        }
                        ?>">
                        <div id="e_f_lleg"><?php
                            if (isset($error['f_lleg'])) {
                                print ("<BR><span style='color: #ff0000'>" . "* " . $error['f_lleg'] . "</span><br/>");
                            }
                            ?></div>
            </div>

                <div class="form-group" style="padding-top:25px">
                    <button type="submit" name="submit_travels" class="button" value="submit">Alta</button>
                </div>
            </td>
            </table>
        </form> 
    </div><!--/.row-->
</div><!--/.container-->
</section><!--/#contact-page-->