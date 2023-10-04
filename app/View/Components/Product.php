<?php

namespace App\View\Components;

use Dotenv\Util\Str;
use Illuminate\View\Component;

class Product extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id;
    public $mediaLink;
    public $name;
    public $price;
    public $color;
    public $gender;
    public $type;

    public function __construct(
        string $id,
        string $mediaLink,
        string $name,
        float $price,
        string $color,
        string $gender,
        string $type
    ) {
        $this->id = $id;
        $this->mediaLink = $mediaLink;
        $this->name = $name;
        $this->price = $price;
        $this->color = $color;
        $this->gender = $gender;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product');
    }
}
