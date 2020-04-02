<?php

interface ShapeInterface { public function area(); }

interface SolidShapeInterface { public function volume(); }

interface ManageShapeInterface { public function calculate(); }

class SumCalculatorOutputter {

    protected $calculator;

    public function __construct($calculator) { $this->calculator = $calculator; }

    public function toJson() { 
        $data = [
          'sum' => $this->calculator->sum()
        ];

        return json_encode($data);
    }

    public function toHtml() {
        return implode('', [
            '<h1>',
                'Suma calculada: ',
                $this->calculator->sum(),
            '</h1>'
        ]);
    }
}

class AreaCalculator {
    protected $shapes;

    public function __construct($shapes = []) { $this->shapes = $shapes; }

    public function sum() {
        foreach ($this->shapes as $shape) {
            if($shape instanceof ManageShapeInterface){
                $area[] = $shape->calculate();
                continue;
            }
            throw new areaCalculatorInvalidShapeException;
        }
        return array_sum($area);
    }
}

class volumeCalculator extends AreaCalculator {}

class Square implements ShapeInterface, ManageShapeInterface {
    public $length;

    public function __construct($length) { $this->length = $length; }

    public function area() { return pow($this->length, 2); }

    public function calculate() { return $this->area(); }
}

class Circle implements ShapeInterface, ManageShapeInterface {
    public $radius;

    public function __construct($radius) { $this->radius = $radius; }

    public function area() { return pi() * pow($this->radius, 2); }

    public function calculate() { return $this->area(); }
}

class Cube implements ShapeInterface, SolidShapeInterface, ManageShapeInterface {
    public $length;

    public function __construct($length) { $this->length = $length; }

    public function area() { return pow($this->length, 2); }

    public function volume() { return pow($this->length, 3); }

    public function calculate() { return $this->volume() + $this->area(); }
}

