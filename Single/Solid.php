<?php

class AreaCalculator {
    protected $shapes;

    public function __construct($shapes = []) { $this->shapes = $shapes; }

    public function sum() {
        foreach ($this->shapes as $shape) {
            if(is_a($shape, 'Square')){
                $area[] = pow($shape->length, 2);
            } elseif (is_a($shape, 'Circle')){
                $area[] = pi() * pow($shape->radius, 2);
            }
        }
        return array_sum($area); 
    }

    public function output() {
        return implode('', [
            "<h1>",
                "Suma de todas las áreas: ",
                $this->sum(),
            "</h1>"
        ]);
    }
}

class Square {
    public $length;

    public function __construct($length) { $this->length = $length; }
}

class Circle {
    public $radius;

    public function __construct($radius) { $this->radius = $radius; }
}


