<?php

namespace App\View\Components;

use Dotenv\Util\Str;
use Illuminate\View\Component;

class CartItem extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $productId;
    public $id;
    public $name;
    public $mediaLink;
    public $price;
    public $quantity;
    public $fullPrice;
    public function __construct(int $id, int $productId, string $name, int $quantity, float $price, string $mediaLink)
    {
        $this->id = $id;
        $this->productId = $productId;
        $this->name = $name;
        $this->mediaLink = $mediaLink;
        $this->price = $price;
        $this->mediaLink = $mediaLink;
        $this->quantity = $quantity;
        $this->fullPrice = $price * $quantity;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cart-item');
    }
}
