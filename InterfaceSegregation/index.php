<?php
require_once ('Solid.php');

$shapes = [ new Circle(2), new Square(3) ];
$solids = [ new Cube(4) ];

$areas = new AreaCalculator($shapes);
$output = new SumCalculatorOutputter($areas);
$volume = new VolumeCalculator($solids);
$output2 = new SumCalculatorOutputter($volume);

echo $output->toHtml();
echo $output->toJson();
echo $output2->toHtml();
echo $output2->toJson();










