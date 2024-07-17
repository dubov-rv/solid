<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Shape\Shape;

class ShapeController extends Controller
{
    public function getArea(Shape $shape): int
    {
        return $shape->getArea();
    }

    public function getPerimeter(Shape $shape): int
    {
        return $shape->getPerimeter();
    }
}
