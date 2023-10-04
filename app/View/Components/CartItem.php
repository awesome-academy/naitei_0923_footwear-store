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
    public $color;
    public $gender;
    public $type;
    public $size;
    public function __construct(
        int $id,
        int $productId,
        string $name,
        int $quantity,
        float $price,
        string $mediaLink,
        string $color,
        string $gender,
        string $type,
        string $size
    ) {
        $this->id = $id;
        $this->productId = $productId;
        $this->name = $name;
        $this->mediaLink = $mediaLink;
        $this->price = $price;
        $this->mediaLink = $mediaLink;
        $this->quantity = $quantity;
        $this->fullPrice = $price * $quantity;
        $this->color = $color;
        $this->gender = $gender;
        $this->type = $type;
        $this->size = $size;
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
