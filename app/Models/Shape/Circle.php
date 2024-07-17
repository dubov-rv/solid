<?php

namespace App\Models\Shape;

class Circle extends Shape
{
    private int $radius;

    public function __construct(int $radius)
    {
        $this->radius = $radius;
    }

    public function getArea(): int
    {
        return pi() * $this->radius * $this->radius;
    }

    public function getPerimeter(): int
    {
        return 2 * pi() * $this->radius;
    }
}
