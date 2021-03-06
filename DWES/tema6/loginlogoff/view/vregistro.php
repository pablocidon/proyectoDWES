<div class="container">    
    <div class="row col-md-12 tecnologias">
        
        <form name="formulario" class="form-horizontal" action="index.php?pagina=registrar" method="post">
            <fieldset>
                <br>
                <div class="form-group">
                    <label for="usuario" class="control-label col-md-2">Usuario</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="alfabetico" name="codUsuario">
                        <?php //si existe mensaje de error lo mostramos
                        if(isset($mensajeError['errorUsuario'])){echo '<span style="color:red">'.$mensajeError['errorUsuario'].'</span>';} ?>
                        <?php if(isset($mensajeError['errorUsuarioRepetido'])){echo '<span style="color:red">'.$mensajeError['errorUsuarioRepetido'].'</span>';} ?>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="password" class="control-label col-md-2">Contraseña</label>
                    <div class="col-md-10">
                        <input type="password" class="form-control" id="alfabetico" name="password" >
                         <?php //si existe mensaje de error lo mostramos
                        if(isset($mensajeError['errorPassword'])){echo '<span style="color:red">'.$mensajeError['errorPassword'].'</span><br>';} ?>                   
                    </div>
                </div>
                <div class="form-group">
                    <label for="repPassword" class="control-label col-md-2">Repetir Contraseña</label>
                    <div class="col-md-10">
                        <input type="password" class="form-control" id="alfabetico" name="repPassword" >
                         <?php //si existe mensaje de error lo mostramos
                        if(isset($mensajeError['errorPasswordNoIgual'])){echo '<span style="color:red">'.$mensajeError['errorPasswordNoIgual'].'</span><br>';} ?>                   
                    </div>
                </div>
                <div class="form-group">
                    <label for="descripcion" class="control-label col-md-2">Descripcion</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="alfabetico" name="descripcion" >
                         <?php //si existe mensaje de error lo mostramos
                        if(isset($mensajeError['errorDescripcion'])){echo '<span style="color:red">'.$mensajeError['errorDescripcion'].'</span><br>';} ?>                   
                    </div>
                </div>
              

                <div class="form-group">
                    <div class="col-md-2 col-md-offset-2"> 
                        <input type="submit" name="enviar" class="btn btn-primary" value="Enviar"/>
                        <input type="submit" name="volver" class="btn btn-primary" value="Volver"/>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
