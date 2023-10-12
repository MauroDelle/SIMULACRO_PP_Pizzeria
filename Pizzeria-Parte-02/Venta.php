<?php

class Venta{

    public $_fecha;
    public $_mail;
    public $_saborPizza;
    public $_tipoPizza;
    public $_cantidadPizza;

    public function __construct(){}

    #region GETTERS
    public function getFecha()
    {
        $this->_fecha = str_replace(" ", "__", $this->_fecha);
        $this->_fecha = str_replace(":", "_", $this->_fecha);
        return $this->_fecha;
    }

    public function getMail()
    {
        return $this->_mail;
    }

    public function getSabor()
    {
        return $this->_saborPizza;
    }

    public function getTipo()
    {
        return $this->_tipoPizza;
    }
    
    public function getCantidad()
    {
        return $this->_cantidadPizza;
    }
   
    #endregion


    #region SETTERS

    public function setFecha($fecha)
    {
        if(!empty($date))
        {
            $this->_fecha = $fecha;
        }
    }
    
    public function setMail($mail)
    {
        if(!empty($mail))
        {
            $this->_mail = $mail;
        }
    }

    public function setSabor($sabor)
    {
        if(!empty($sabor))
        {
            $this->_saborPizza = $sabor;
        }
    }

    public function setTipo($tipo)
    {
        if(!empty($tipo))
        {
            $this->_tipoPizza = $tipo;
        }
    }

    public function setCantidad($cantidad){
        if (!empty($cantidad) && is_numeric($cantidad)) {
            $this->_cantidadPizza = $cantidad;
        }
    }



    #endregion

    public static function Vender($mail,$pizza)
    {
        $venta = new Venta();
        $venta->setFecha(date('Y-m-d H:i:s'));
        $venta->setMail($mail);
        $venta->setSabor($pizza->getSabor());
        $venta->setTipo($pizza->getTipo());
        $venta->setCantidad($pizza->getCantidad());
        return $venta;
    }



}






?>