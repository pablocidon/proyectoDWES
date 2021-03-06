<?php
/**
 * File  cCopiaSeguridad.php
 * @author Pablo Cidón.
 *
 * Fichero que contiene el controlador de la exportación/copia de seguridad.
 * Fecha última revisión 16-04-2018
 */
$documentoXML = new DOMDocument('1.0','UTF-8');//Creamos nuestro documento XML.
$departamentos = $documentoXML->createElement('Departamentos');//Dentro del XML, creamos el elemento Departamentos, que contendrá todos los registros.
$departamentos = $documentoXML->appendChild($departamentos);//Añadimos el elemento al archivo.
/**
 * Ejecutamos la consulta y vamos recorriendo cada uno de los registros que va devolviendo la consulta.
 * Dentro del bucle, iremos creando los elementos y extrayendo los datos que va a almacenar cada uno de ellos.
 */
try{
    $consulta = Departamento::listarDepartamentos();
    for($i=0;$i<count($consulta);$i++){
        $departamento = $documentoXML->createElement('Departamento');
        $departamento = $departamentos->appendChild($departamento);
        $codigo=$documentoXML->createElement('Codigo',$consulta[$i]->getCodDepartamento());
        $codigo =$departamento->appendChild($codigo);
        $descripcion=$documentoXML->createElement('Descripcion',$consulta[$i]->getDescDepartamento());
        $descripcion =$departamento->appendChild($descripcion);
        $alta=$documentoXML->createElement('FechaAlta',$consulta[$i]->getFechaAltaDepartamento());
        $alta =$departamento->appendChild($alta);
        $volumen=$documentoXML->createElement('VolumenDeNegocio',$consulta[$i]->getVolumenDeNegocio());
        $volumen =$departamento->appendChild($volumen);
        $baja=$documentoXML->createElement('FechaBaja',$consulta[$i]->getFechaBajaDepartamento());
        $baja =$departamento->appendChild($baja);
    }
    $documentoXML->formatOutput = true;  //Dar formato al archivo XML.
    $documentoXML->saveXML();//Guardamos el XML.
    $documentoXML->save('departamentos.xml');//Guardamos el fichero con el nombre 'departamentos.xml'.
}catch (PDOException $e){
    print $e -> getMessage();//Si hay excepciones, mostraremos los mensajes.
}finally{
    unset($conexion);
}
/**
 * De todos modos, cargaremos nuestra página e incluiremos el layout.
 */
$_GET['pagina'] = 'copia';
require_once 'vista/layout.php';
?>