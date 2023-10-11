<?php
    require_once 'Pizza.php';

    if(isset($_GET['Sabor']) && isset($_GET['Precio']) && isset($_GET['Tipo']) && isset($_GET['Cantidad']))
    {
        $pSabor = $_GET['Sabor'];
        $pPrecio = floatval($_GET['Precio']);
        $pTipo = $_GET['Tipo'];
        $pCantidad = intval($_GET['Cantidad']);

        //creo una nueva pizza
        $nuevaPizza = crearPizza($pSabor,$pPrecio,$pTipo,$pCantidad);

        //Muestro la info de la pizza
        //mostrarPizza($nuevaPizza);

        //Ahora agrego o actualizop la pizza en el array;
        $resultado = Pizza::ActualizarArray($nuevaPizza,"add");

        echo "$resultado";

    }else{
        echo 'Falta al menos un dato';
    }


    function crearPizza($sabor,$precio,$tipo,$cantidad)
    {
        $pID = rand(1,9);
        return new Pizza($pID,$sabor,$precio,$tipo,$cantidad);
    }

    // function mostrarPizza($pizza)
    // {
    //     echo '<h1>Pizza a buscar</h1>';
    //     var_dump($pizza);
    // }





?>