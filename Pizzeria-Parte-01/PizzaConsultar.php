<?php
require_once 'Pizza.php';

    var_dump(key($_POST));

    if(isset($_POST['Sabor']) && isset($_POST['Tipo']))
    {
        $sabor = $_POST['Sabor'];
        $tipo = $_POST['Tipo'];
        var_dump(key($_POST));

        $arrayPizzas = Pizza::LeerJSON();

        echo '<h1>Usted va a buscar: </h1>';
        echo ' <h1> Sabor: '.$sabor.' Tipo: '.$tipo.'</h1><br>';

        echo '<h3>' . Pizza::Buscar($arrayPizzas,$sabor,$tipo) . '</h3> <br>';

    }







?>