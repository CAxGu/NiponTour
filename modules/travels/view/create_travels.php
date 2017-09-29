<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/dropzone.css">
<!-- Script with absolute route -->
<script type="text/javascript" src="modules/travels/view/js/travels.js" ></script>
<section id="contact-page">
    <div class="container">
        <div class="center">  
            <br><br><br>      
            <h2>Añadir Viaje    </h2>
            <p class="lead">Rellene el siguiente formulario para agregar un nuevo viaje al sistema.</p>
        </div>  
        <div class="row contact-wrap"> 
            <div class="status alert alert-success" style="display: none"></div>

            <form id="form_user" name="form_user"><!---->
                <div class ="form-group">
                    <input type="hidden" name="alta_travels" value="alta_travels">
                </div>
                <div class="col-sm-5 col-sm-offset-1">
                    <div class="form-group">
                        <label>ID VIAJE *</label>
                        <input size="15" name="idviaje" id="idviaje" type="text" maxlength="5" placeholder="ID" class="form-control" value="" required="required">
                            <div id="e_idviaje"></div>
                    </div>
                    <br />
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
                        <div id="e_destino"></div>
                    </div>
                    <br />
                    <div class="form-group">
                        <label>Precio *</label>
                        <input size="30" id="precio" maxlength="4" type='number' min="70" max="4000" name="precio" class="form-control" placeholder="precio" value="" required="required">
                            <div id="e_precio"></div> 
                    </div>
                    <br />
                    <div class="form-group">
                    <label>Oferta</label><br>
                        <input name="oferta" id="oferta" type="radio" <?php if (isset($oferta) && $oferta=="No")?> value="No" checked>NO
                        <input name="oferta" id="oferta" type="radio" <?php if (isset($oferta) && $oferta=="Si")?> value="Si">SI
                    </div>
                    <br />
                    <div class="form-group">
                    <label>Tipo *</label><br>
                        <input name="tipo[]" id="tipo[]" type="checkbox" class="messageCheckbox" value="Crucero">Crucero
                        <input name="tipo[]" id="tipo[]" type="checkbox" class="messageCheckbox" value="Tour">Tour
                        <input name="tipo[]" id="tipo[]" type="checkbox" class="messageCheckbox" value="Visita">Visita
                        <div id="e_tipo"></div>    
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group">
                        <label>Fecha de Salida *</label>
                        <input type="text" name= "f_sal" id="f_sal" class="form-control" placeholder="mm/dd/yyyy" value="">
                        <div id="e_f_sal"></div>
                    </div>
                    <br />
                    <div class="form-group">
                    <label>Fecha de Llegada *</label>
                    <input type="text" name= "f_lleg" id="f_lleg" class="form-control" placeholder="mm/dd/yyyy" value="">
                    <div id="e_f_lleg"></div>
                    </div>
                    <br />
                    <br />
                    <br />
                    <div class="form-group" id="progress">
                        <div id="bar"></div>
                        <div id="percent">0%</div >
                    </div>

                    <div class="msg"></div>
                    <br/>
                    <div id="dropzone" class="dropzone"></div><br/>
                    <br/>
                    <br/>
                    <br/>
                    
                    <div class="form-group">
                        <button type="button" id="submit_travel" name="submit_travel" class="btn btn-primary btn-lg" value="submit">Alta</button>
                    </div>
                </div>
            </form> 
        </div><!--/.row-->
    </div><!--/.container-->
</section><!--/#contact-page-->