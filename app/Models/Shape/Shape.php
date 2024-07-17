<?php

namespace App\Models\Shape;

abstract class Shape
{
    abstract public function getArea(): int;
    abstract public function getPerimeter(): int;
}
