<?php
/**
 * File  vMtoDepartamentos.php
 * @author Pablo Cidón.
 *
 * Fichero que contiene la vista del mantenimiento de los departamentos.
 * Fecha última revisión 16-04-2018
 */
?>
<!--
    Cargamos el fichero de jQuery, que será utlizado para activar o desactivar el botón de importar,
    dependiendo de si hay algún fichero seleccionado.
    -->
<script src="webroot/js/jquery.js"></script>
<script type="text/javascript">
    /**
     * Script utilizado para controlar que hay un fichero seleccionado y así eliminar el atributo disabled del botón de importar.
     */
    $(document).ready(function (){
        $('#importar').attr('disabled', 'disabled');//Elemento cuyo ID sea importar añadimos el atributo 'disabled'.
        $('#fichero').change(function (){//Si cambia el elemento cuyo ID sea fichero, comprobamos que su valor sea distinto a vacío, eliminaremos el atributo 'disabled' del elemento anterior.
            if ($(this).val() != ''){
                $('#importar').removeAttr('disabled');
            }
        });
    });
</script>
<!--Formulario en el que mostraremos el cuadro de búsqueda y una tabla con los resultados devueltos por la base de datos-->
<h3>Búsqueda de departamentos</h3>
<form name="formulario" class="form-horizontal" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post">
    <fieldset>
        <div class="form-group col-md-12">
            <button type="button" class="btn btn-link col-md-1"><a href="index.php?pagina=mantenimiento"><span class="glyphicon glyphicon-search"></span> Buscar</a></button>
            <button type="button" class="btn btn-link col-md-1"><a href="index.php?pagina=alta"><span class="glyphicon glyphicon-plus"></span> Nuevo</a></button>
            <button type="button" class="btn btn-link col-md-2"><a href="index.php?pagina=copia" title="Descarga de todos los departamentos"><span class="glyphicon glyphicon-export"></span> Copia de Seguridad</a></button>
            <button type="submit" class="btn btn-link col-md-1" id="importar" name="importar"><span class="glyphicon glyphicon-import"></span> Importar</button>
            <input type="file" id="fichero" name="fichero" accept="text/xml" class="col-md-4"/>
        </div>
        <br>
        <div class="form-group">
            <label for="DescDepartamento" class="control-label col-md-3">Descripcion Departamento:</label>
            <div class="col-md-7">
                <input type="text" class="form-control" id="alfabetico" name="DescDepartamento"
                       placeholder="" <?php if (isset($_POST['DescDepartamento']) && empty($mensajeError['errorDescDepartamento'])) {
                    echo 'value="', $_POST['DescDepartamento'], '"';
                } ?>>
                <?php if (isset($mensajeError['errorDescDepartamento'])) {
                    echo '<span style="color:red">' . $mensajeError['errorDescDepartamento'] . '</span>';
                } //Si hay algún error, mostraremos el mensaje de error?>
            </div>
            <div class="col-md-2">
                <input type="submit" name="buscar" class="btn btn-primary" value="Buscar"/>
            </div>
        </div>
    </fieldset>
    <table class="table">
        <thead>
        <tr>
            <th>Codigo</th>
            <th>Descripcion</th>
            <th>Editar/Borrar</th>
        </tr>
        </thead>
        <tbody>
        <?php
        /**
         * Obtenemos los registros de la base de datos los recorremos cargándolos en una tabla.
         */
        for ($i=0;$i<count($departamentos);$i++){
            echo "<tr>";
            echo "<td>". $departamentos[$i]->getCodDepartamento() ."</td>";
            echo "<td>". $departamentos[$i]->getDescDepartamento() ."</td>";
            echo '<td><a href="index.php?Departamento='.$departamentos[$i]->getCodDepartamento().'&pagina=modificar"><span class="glyphicon glyphicon-pencil"></span> </a>/ 
                        <a href="index.php?Departamento='.$departamentos[$i]->getCodDepartamento().'&pagina=eliminar"><span class="glyphicon glyphicon-trash"></span></a> 
                        </td>';//Creamos los enlaces a las ventanas de eliminar y editar, pasando como uno de los parámetro el código del departamento seleccionado
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</form>





