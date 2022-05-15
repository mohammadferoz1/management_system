<?php

namespace App\View\Components\TableHorizontal;

use Illuminate\View\Component;

class Headings extends Component
{
    public $title, $subTitle;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $subTitle)
    {
        $this->title = $title;
        $this->subTitle = $subTitle;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table-horizontal.headings');
    }
}
