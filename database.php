<?php

function connect_db() {

    $strHost = "localhost";
    $strUser = "root";
    $strPassword = "123123";
    $strDBName = "crud";

    $resLink = @mysql_connect($strHost, $strUser, $strPassword);

    if ($resLink === FALSE) {
        die("Error de conexion a la DB. ");
    }

    $bolResult = @mysql_select_db($strDBName);

    if ($bolResult === FALSE) {
        die("Error la DB no existe! " . $strDBName);
    }
}

function consultar_db($strSQL) {

    $resQuery = @mysql_query($strSQL);

    if ($resQuery === FALSE) {
        die("No se pudo ejecutar la consulta en la base de datos: " . mysql_error());
    }

    if ($resQuery === TRUE) {
        return TRUE;
    }

    $arrTodos = array();

    while ($arrFila = @mysql_fetch_assoc($resQuery)) {
        $arrTodos[] = $arrFila;
    }

    return $arrTodos;
}
