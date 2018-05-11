<?php
    //require_once "../view/cabeceraEjercicios.php";
?>
<br>
        <form action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post">
            <a href="index.php?numeroPagina=1&pagina=mantenimiento" class="btn btn-primary">Mantenimiento de Departamentos</a>
            <div class="pull-right">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['usuario']->getCodUsuario();?>
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><button type="button" class="btn btn-link"><a href="index.php?pagina=editar"><span class="glyphicon glyphicon-cog"></span> Editar Perfil</a></button></li>
                        <li><button type="button" class="btn btn-link"><a href="index.php?pagina=borrar"><span class="glyphicon glyphicon-trash"></span> Borrar Cuenta</a></button> </li>
                        <li class="divider"></li>
                        <li><button type="submit" name="salir" class="btn btn-link"><span class="glyphicon glyphicon-log-out"></span> Cerrar Sesión</button></li>
                    </ul>
                </div>
            </div>
        </form>
<?php 
    echo "<h1>Welcome ",$_SESSION['usuario']->getCodUsuario(),"!</h1><br>"; 
    echo "<h1>El perfil de este usuario es ",$_SESSION['usuario']->getPerfil(),"</h1><br>"; 
    echo "<h1>Descripcion: ",$_SESSION['usuario']->getDescripcion(),"</h1><br>";
    echo "<h1>Ultima visita: ",$_SESSION['usuario']->getUltimaConexion(),"</h1><br>"; 
    echo "<h1>Numero de visitas: ",$_SESSION['usuario']->getNumeroAccesos(),"</h1><br>"; 
?>


<?php
//require_once "../view/pie.php";
?>
