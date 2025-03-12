<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    public $id;
    public $title;

    /**
     * @return void
     */
    public function __construct($id, $title)
    {
        $this->id = $id;
        $this->title = $title;
    }

    /**
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.modal');
    }
}
