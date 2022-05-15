<?php

namespace App\View\Components\TableHorizontal;

use Illuminate\View\Component;

class Cell extends Component
{
    public $title, $value;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $value)
    {
        $this->title = $title;
        $this->value = $value;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table-horizontal.cell');
    }
}
