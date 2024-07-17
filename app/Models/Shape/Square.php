<?php

namespace App\Models\Shape;

class Square extends Shape
{
    private int $side;

    public function __construct(int $side)
    {
        $this->side = $side;
    }

    public function getArea(): int
    {
        return $this->side * $this->side;
    }

    public function getPerimeter(): int
    {
        return 4 * $this->side;
    }
}
