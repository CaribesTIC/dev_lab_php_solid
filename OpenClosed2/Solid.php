<?php

interface ShapeInterface { public function area(); }

class AreaCalculator {
    protected $shapes;

    public function __construct($shapes = []) { $this->shapes = $shapes; }

    public function sum() {
        foreach ($this->shapes as $shape) { 
            if($shape instanceof ShapeInterface){
                $area[] = $shape->area();
                continue;
            }
            throw new AreaCalculatorInvalidShapeException;
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

class Square implements ShapeInterface {
    public $length;

    public function __construct($length) { $this->length = $length; }

    public function area() { return pow($this->length, 2); }
}

class Circle implements ShapeInterface {
    public $radius;

    public function __construct($radius) { $this->radius = $radius; }

    public function area() { return pi() * pow($this->radius, 2); }
}

