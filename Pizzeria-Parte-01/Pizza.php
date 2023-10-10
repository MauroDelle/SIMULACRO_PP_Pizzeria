<?php

class Pizza{

    private $_id;
    private $_sabor;
    private $_precio;
    private $_tipo;
    private $_cantidad;

    #region CONSTRUCT
    public function __construct($id,$sabor,$precio,$tipo,$cantidad)
    {
        $this->setID($id);
        $this->setSabor($sabor);
        $this->setPrecio($precio);
        $this->setTipo($tipo);
        $this->setCantidad($cantidad);
    }
    #endregion


    #region SETTERS

    public function setID($id)
    {
        if(isset($id) && is_numeric($id))
        {
            $this->_id = $id;
        }
    }

    public function setSabor($sabor)
    {
        if(isset($sabor))
        {
            $this->_sabor = $sabor;
        }
    }

    public function setPrecio($precio)
    {
        if(isset($precio) && is_numeric($precio))
        {
            $this->_precio = $precio;
        }
    }

    public function setCantidad($cantidad)
    {
        if(isset($cantidad) && is_numeric($cantidad))
        {
            $this->_cantidad = $cantidad;
        }
    }

    public function setTipo($tipo){
        if (isset($tipo)){
            $this->_tipo = $tipo;
        }
    }



    #endregion

    #region GETTERS

    public function getID()
    {
        return $this->_id;
    }

    public function getSabor()
    {
        return $this->_sabor;
    }

    public function getPrecio()
    {
        return $this->_precio;
    }

    public function getTipo()
    {
        return $this->_tipo;
    }
    public function getCantidad()
    {
        return $this->_cantidad;
    }

    #endregion

    #region METODOS

    public static function ActualizarArray($pizza,$action):string
    {
        //ruta del archivo json
        $filePath = 'Pizza.json';
        //el mensaje a devolver;
        $message = '';

        

        return $message;
    }




    #endregion




    #region JSON-FUNCTIONS

    public static function LeerJSON($filename = "Pizza.json"):array
    {

        //creo un array vacio para almacenar las pizzas
        $pizzas = array();

        try{
            //primero compruebo si el archivo especificcado ($filename) existe en el sistema de archivos
            if(file_exists($filename))
            {
                //abre el archivo en modo lectura
                $file = fopen($filename, "r");

                if($file)
                {
                    //leo el contenido completo del archivo en una variable como una cadena JSON
                    $json = fread($file, filesize($filename));

                    //decodifico el JSON en un array asociativo
                    $pizzasFromJson = json_decode($json,true);

                    //itero por cada pizza en el array decodificado;
                    foreach($pizzasFromJson as $pizza)
                    {
                        //creo una nueva instancia de la clase Pizza y agrego la pizza al array $pizzas
                        array_push($pizzas, new Pizza(
                            $pizza["_id"],        // ID de la pizza
                            $pizza["_sabor"],     // Sabor de la pizza
                            $pizza["_precio"],    // Precio de la pizza
                            $pizza["_tipo"],      // Tipo de la pizza
                            $pizza["_cantidad"]   // Cantidad de la pizza
                        ));
                    }
                }

                //cierro el archivo despues de leerlo
                fclose($file);
            }
        }catch(\Throwable $th){
            // En caso de que ocurra una excepción, imprime un mensaje de error
            echo "Error while reading the file";
        }
        finally{

            //devuelvo el array de pizzas, ya sea vacio o con las pizzas leidas del archivo
            return  $pizzas;
        }
    }

    public static function GuardarEnJSON($pizzasArray, $filename = "Pizza.json"):bool
    {
        //Inicializo una variable para el exito/fallo de la operacion de guardado;
        $success = false;

        try{
            //abro el archivo en modo escritura, y si no existe lo creo
            $file = fopen($filename, "w");

            if($file)
            {
                // Convierte el array de pizzas en formato JSON con formato legible
                $json = json_encode($pizzasArray, JSON_PRETTY_PRINT);
                // Escribe la cadena JSON en el archivo
                fwrite($file, $json);
                // Indica que la operación de guardado fue exitosa
                $success = true;
            }
        }catch(\Throwable $th)
        {
            //En caso de que ocurra una excepcion, imprime un mensaje de error.
            echo "Error al guardar el archivo";
        }
        finally{

            //Cierro el archivo despues de escribir en el;
            fclose($file);
            //devuelve true si el guardado fue exitoso, de lo contrario, false;
            return $success;
        }
    }

    #endregion


}




?>