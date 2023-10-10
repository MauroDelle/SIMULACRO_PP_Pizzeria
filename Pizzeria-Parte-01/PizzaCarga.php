<?php
    require_once 'Pizza.php';

    if(isset($_GET['Sabor']) && isset($_GET['Precio']) && isset($_GET['Tipo']) && isset($_GET['Cantidad']))
    {
        $pSabor = $_GET['Sabor'];
        $pPrecio = floatval($_GET['Precio']);
        $pTipo = $_GET['Tipo'];
        $pCantidad = intval($_GET['Cantidad']);


        

    }else{
        echo 'Falta al menos un dato';
    }







?>