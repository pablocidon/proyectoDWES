<?php
/*
    * Autor: Pablo Cidón.
    * Creado: 02-04-2018.
    * Archivo: cMtoDepartamentos.php
    * Modificado: 10-04-2018.
*/
    $mensajeError;
    $cadenaBuscar;
    $correcto = true;
    $departamentos = '';
    $error = false;

    //Variables de la importación
    $numRegistros = 0;
    $CodDepartamento = "";
    $DescDepartamento = "";
    $FechaAlta = "";
    $Volumen = "";
    $cantidadDepartamentos = "";
    $numeroPaginas = "";
    $paginaActual = "";
if (!isset($_SESSION['usuario'])) { //Comprobamos si no existe la sesion
    header("Location: index.php"); //Si no existe nos manda registrarnos
} else{
    if (isset($_POST['buscar'])){
        $mensajeError["errorDescDepartamento"]= validacionFormularios::comprobarAlfaNumerico($_POST['DescDepartamento'], 255, 0, 0);
        foreach ($mensajeError as &$valor){
            if ($valor!=null){
                $correcto=false;
            }
        }
        if($correcto){
            $departamentos = Departamento::buscarDepartamentoPorDescripcionPaginado($_POST['DescDepartamento'], $_GET['numeroPagina'],REGISTROSPAGINA);
            $cantidadDepartamentos = Departamento::contarDepartamentosPorDescripcion($_POST['DescDepartamento']);
            $numeroPaginas = ceil($cantidadDepartamentos/REGISTROSPAGINA);
        }
    }else{
        $cadenaBuscar='';
        $departamentos = Departamento::buscarDepartamentoPorDescripcionPaginado($cadenaBuscar,$_GET['numeroPagina'],REGISTROSPAGINA);
        $cantidadDepartamentos = Departamento::contarDepartamentosPorDescripcion($cadenaBuscar);
        $numeroPaginas = ceil($cantidadDepartamentos/REGISTROSPAGINA);
    }

    if(isset($_POST['importar'])){
        echo "<script>console.log('Importar');</script>";
        $_FILES['fichero']['tmp_name'] = $_POST['fichero'];
        $xml_file = $_FILES['fichero']['tmp_name'];//Aparece el cuadro para seleccionar el documento
        if (file_exists($xml_file)) {//En caso de que exista el xml
            $xml = simplexml_load_file($xml_file);//Carga el archivo xml

            foreach ($xml->Departamento as $departamento) {
                $numRegistros++;//Contamos los registros
                $CodDepartamento = $departamento->CodDepartamento;
                $DescDepartamento = $departamento->DescDepartamento;
                $FechaAlta = $departamento->FechaAlta;
                $Volumen = $departamento->VolumenDeNegocio;
                try {
                    $consulta = Departamento::altaDepartamento($CodDepartamento,$DescDepartamento,$FechaAlta,$Volumen);
                } catch (PDOException $PdoE) {//Error que va saltar
                    echo "<script>alert('El' $numRegistros 'º registro ha fallado');</script>";
                }
            }
        } else {//Por el contrario
            echo "<script>alert('Error al importar');</script>";
            $_GET["pagina"]="mantenimiento";
            require_once 'vista/layout.php';
        }
    }
    $_GET["pagina"]="mantenimiento";
    require_once 'vista/layout.php';
}

?>