<?php

interface AutomovilInterface {
    public function getTipo();
    public function setMarca($modelo);
}


class Coche implements AutomovilInterface {
    private $_marca;
    public function __construct($marca = 'Generico') {
        $this->_marca = $marca;
    }  
    public function getTipo(){
        return "Coche ". $this->_marca."</br>";
    }
    public function setMarca($marca){
        $this->_marca = $marca;
    }
}

class Moto implements AutomovilInterface {
    private $_marca;
    public function __construct($marca = 'Generica') {
        $this->_marca = $marca;
    }
    public function getTipo(){
        return "Moto ". $this->_marca."</br>";
    }
    public function setMarca($marca){
        $this->_marca = $marca;
    }
}

$obj = new Coche();
echo $obj->getTipo();

$obj = new Moto();
echo $obj->getTipo();

$obj = new Coche('Toyota');
echo $obj->getTipo();
echo $obj->setMarca('Ford');
echo $obj->getTipo();

$obj = new Moto('Suzuky');
echo $obj->getTipo();
echo $obj->setMarca('Yamaha');
echo $obj->getTipo();

