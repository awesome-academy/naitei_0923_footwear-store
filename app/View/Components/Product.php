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
    public string $id;
    public string $mediaLink;
    public string $name;
    public float $price;

    public function __construct(string $id, string $mediaLink, string $name, float $price)
    {
        $this->id = $id;
        $this->mediaLink = $mediaLink;
        $this->name = $name;
        $this->price = $price;
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
