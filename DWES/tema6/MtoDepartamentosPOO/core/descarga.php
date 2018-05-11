<?php
/**
 * File  descarga.php
 * @author Pablo Cidón.
 *
 * Fichero que contiene un script para descargar archivos.
 * Fecha última revisión 16-04-2018
 */
header("Content-disposition: attachment; filename=departamentos.xml");//Llamaremos a la descarga del archivo.
header("Content-type: text/xml");//Mostraremos un archivo XML.
readfile("../departamentos.xml");//Lectura del archivo que va a ser descargado.
?>