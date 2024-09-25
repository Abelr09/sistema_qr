<?php
session_start();

$mensaje = "";

if (isset($_POST['btnAccion'])) {

    switch ($_POST['btnAccion']) {
        case 'Agregar': //opoenssl_decrypt para desencriptar la info
            if (is_numeric(openssl_decrypt($_POST['id'], cod, key))) {
                $id = openssl_decrypt($_POST['id'], cod, key);
                $mensaje .= "OK id correcto" . $id . "</br>";
            } else {
                $mensaje .= "id incorrecto" . $id . "</br>";
            }
            if (is_string(openssl_decrypt($_POST['nombre'], cod, key))) {
                $nombre = openssl_decrypt($_POST['nombre'], cod, key);
                $mensaje .= "OK nombre correcto" . $nombre . "</br>";
            } else {
                $mensaje .= "Algo salió mal con el nombre..." . "</br>";
                break;
            }
            if (is_numeric(openssl_decrypt($_POST['cantidad'], cod, key))) {
                $cantidad = openssl_decrypt($_POST['cantidad'], cod, key);
                $mensaje .= "OK cantidad correcto" . $cantidad . "</br>";
            } else {
                $mensaje .= "Ups algo salió mal con la cantidad..." . "</br>";
                break;
            }
            if (is_numeric(openssl_decrypt($_POST['precio'], cod, key))) {
                $precio = openssl_decrypt($_POST['precio'], cod, key);
                $mensaje .= "OK precio correcto" . $precio . "</br>";
            } else {
                $mensaje .= "Ups algo salio mal con el precio" . "</br>";
                break;
            }
            if (!isset($_SESSION['carrito'])) {
                $producto = array(
                    'id' => $id,
                    'nombre' => $nombre,
                    'cantidad' => $cantidad,
                    'precio' => $precio
                );
                $_SESSION['carrito'][0] = $producto;
            } else {
                $numeroProductos = count($_SESSION['carrito']);
                $producto = array(
                    'id' => $id,
                    'nombre' => $nombre,
                    'cantidad' => $cantidad,
                    'precio' => $precio
                );
                $_SESSION['carrito'][$numeroProductos] = $producto;
            }
            $mensaje = print_r($_SESSION, true);
            break;
    }
}
