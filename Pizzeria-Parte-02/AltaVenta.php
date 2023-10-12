<?php
require_once 'Pizza.php';
require_once 'Venta.php';

date_default_timezone_set('America/Argentina/Buenos_Aires');

if(isset($_POST['Sabor']) && isset($_POST['Email']) && isset($_POST['Tipo']) && isset($_POST['Cantidad']))
{
    $sabor = $_POST['Sabor'];
    $mail = $_POST['Mail'];
    $tipo = $_POST['Tipo'];
    $cantidad = intval($_POST['Cantidad']);

    $unaPizza = new Pizza(null,$sabor,null,$tipo,$cantidad);

    echo '<h1>Pizza a Buscar para vender</h1>';
    var_dump($unaPizza);

    if(Pizza::ActualizarArray($unaPizza,"sub"))
    {
        $venta = Venta::Vender($mail,$unaPizza);

        $ubicacionImagen = "./ImagenesDeLaVenta/";


    }




}






?>