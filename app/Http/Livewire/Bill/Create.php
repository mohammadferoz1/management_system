<?php

namespace App\Http\Livewire\Bill;

use App\Models\Site;
use Livewire\Component;

class Create extends Component
{
    public $sites;
    public $product= [];
    public $price = [];

    public function mount(){
        $this->sites = Site::all();
        $this->product = [];
        $this->price = [];
        $this->optionCount = 1;
    }
    public function render()
    {
        return view('livewire.bill.create');
    }
}
