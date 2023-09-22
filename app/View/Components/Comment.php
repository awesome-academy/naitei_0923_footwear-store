<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Comment extends Component
{
    public $username;
    public $time;
    public $comment;
    public $rating;
    public $score;
    public function __construct($username, $createAt, $comment, $point)
    {
        $this->username = $username;
        $this->time = $createAt;
        $this->comment = $comment;
        $this->rating = ceil($point / config('app.point'));
        $this->score = $point;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.comment');
    }
}
