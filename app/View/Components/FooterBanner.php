<?php

namespace App\View\Components;

use Dotenv\Util\Str;
use Illuminate\View\Component;

class FooterBanner extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $discount;
    public $largeText1;
    public $largeText2;
    public $saleTime;
    public $midText;
    public $desc;
    public $product;
    public $image;
    public $smallText;

    public function __construct(
        string $discount,
        string $largeText1,
        string $largeText2,
        string $saleTime,
        string $smallText,
        string $midText,
        string $desc,
        string $product,
        string $image
    ) {
        $this->discount = $discount;
        $this->largeText1 = $largeText1;
        $this->largeText2 = $largeText2;
        $this->saleTime = $saleTime;
        $this->midText = $midText;
        $this->desc = $desc;
        $this->product = $product;
        $this->image = $image;
        $this->smallText = $smallText;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.footer-banner');
    }
}
