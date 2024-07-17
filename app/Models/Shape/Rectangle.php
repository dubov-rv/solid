<?php

namespace App\Models\Shape;

class Rectangle extends Shape
{
    private int $width;
    private int $height;

    public function __construct(int $width, int $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function getArea(): int
    {
        return $this->width * $this->height;
    }

    public function getPerimeter(): int
    {
        return 2 * ($this->width + $this->height);
    }
}
