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
                   <input size="15" name="idviaje" type="text" placeholder="Introduce el ID del viaje" class="form-control" required="required" value="<?php echo $_POST?$_POST['idviaje']:""; ?>" >	
                </div>
                <div class="form-group">
                    <label>Destino *</label>
                    <select name="destino" id="destino" class="form-control" required="required">
                        <option value="" selected> Seleccione el Destino </option>
                        <option value="España" <?php if($_POST['destino']==="España") echo 'selected'?>>España</option>
                        <option value="Francia" <?php if($_POST['destino']==="Francia") echo 'selected'?>>Francia</option>
                        <option value="Portugal" <?php if($_POST['destino']==="Portugal") echo 'selected'?>>Portugal</option>
                        <option value="Andorra" <?php if($_POST['destino']==="Andorra") echo 'selected'?>>Andorra</option>
                        <option value="Argentina" <?php if($_POST['destino']==="Argentina") echo 'selected'?>>Argentina</option>
                        <option value="Bélgica" <?php if($_POST['destino']==="Bélgica") echo 'selected'?>>Bélgica</option>
                        <option value="China" <?php if($_POST['destino']==="China") echo 'selected'?>>China</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Precio *</label>
                    <input size="30" maxlength="4" type='number' min="70" max="4000" name="precio" class="form-control" required="required" placeholder="€" value="<?php echo $_POST?$_POST['precio']:""; ?>" >
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
            </div>
            <div class="form-group">
                <label>Fecha de Salida *</label>
                <input size="30" type="date" name= "f_sal" id="f_sal" class="form-control" required="required" placeholder="Ingrese la fecha de salida" value="<?php echo $_POST?$_POST['f_sal']:""; ?>" >
            </div>
            <div class="form-group">
                <label>Fecha de Vuelta *</label>
                <input size="30" type="date" name= "f_lleg" id="f_lleg" class="form-control" required="required" placeholder="Ingrese la fecha de vuelta" value="<?php echo $_POST?$_POST['f_lleg']:""; ?>" >
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