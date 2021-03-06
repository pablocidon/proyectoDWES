
<div class="container">    
    <div class="row col-md-12 tecnologias">
        
        <form name="formulario" class="form-horizontal" action="index.php?pagina=editar" method="post">
            <fieldset>
                <br>
                <div class="form-group">
                    <label for="usuario" class="control-label col-md-2">Usuario</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="alfabetico" name="codUsuario" value="<?php echo $_SESSION['usuario']->getCodUsuario(); ?>" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="perfil" class="control-label col-md-2">Perfil</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="alfabetico" name="perfil" value="<?php echo $_SESSION['usuario']->getPerfil(); ?>" disabled>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="descripcion" class="control-label col-md-2">Descripcion</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="alfabetico" name="descripcion" value="<?php if(isset($_POST['enviar'])){ echo $_POST['descripcion'];}else{ echo $_SESSION['usuario']->getDescripcion();}?>">
                         <?php //si existe mensaje de error lo mostramos
                        if(isset($mensajeError['errorDescripcion'])){echo '<span style="color:red">'.$mensajeError['errorDescripcion'].'</span><br>';} ?>                          
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="password" class="control-label col-md-2">Contraseña</label>
                    <div class="col-md-10">
                        <input type="password" class="form-control" id="alfabetico" name="password" value="<?php echo $_SESSION['usuario']->getPassword(); ?>">
                         <?php //si existe mensaje de error lo mostramos
                        if(isset($mensajeError['errorPassword'])){echo '<span style="color:red">'.$mensajeError['errorPassword'].'</span><br>';} ?>                   
                    </div>
                </div>
                <div class="form-group">
                    <label for="repPassword" class="control-label col-md-2">Repetir Contraseña</label>
                    <div class="col-md-10">
                        <input type="password" class="form-control" id="alfabetico" name="repPassword" value="<?php echo $_SESSION['usuario']->getPassword(); ?>">
                         <?php //si existe mensaje de error lo mostramos
                        if(isset($mensajeError['errorPasswordNoIgual'])){echo '<span style="color:red">'.$mensajeError['errorPasswordNoIgual'].'</span><br>';} ?>                   
                    </div>
                </div>
                <div class="form-group">
                    <label for="numeroAccesos" class="control-label col-md-2">Numero accesos</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="alfabetico" name="numeroAccesos" value="<?php echo $_SESSION['usuario']->getNumeroAccesos(); ?>" disabled>
                    </div>
                </div> 
                <div class="form-group">
                    <label for="ultimaConexion" class="control-label col-md-2">Ultima conexion</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="alfabetico" name="ultimaConexion" value="<?php echo $_SESSION['usuario']->getUltimaConexion(); ?>" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-2 col-md-offset-2"> 
                        <input type="submit" name="enviar" class="btn btn-primary" value="Enviar"/>
                        <a href="index.php?pagina=inicio" class="btn btn-primary">Volver</a>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>

