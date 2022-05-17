<?php

namespace App\Http\Livewire\Bill;

use App\Models\Site;
use Livewire\Component;
use App\Models\Bill;

class Create extends Component
{
    public $sites;
    public $products= [];
    public $prices = [];
    public $site_id;

    public function mount(){
        $this->sites = Site::all();
        $this->products = [];
        $this->prices = [];
        $this->optionCount = 1;

    }
    public function render()
    {
        return view('livewire.bill.create');
    }
    public function store(){
        $product_detail = [];
        $total_price = 0;
        foreach($this->prices as $price){
            $total_price += $price;
        }
        for($i = 0 ; $i < count($this->products); $i++)
        {
            array_push($product_detail, array("name" => $this->products[$i], "price" => $this->prices[$i]));
        }
        $product_detail = json_encode($product_detail);
        $this->validate([
            'site_id' => 'required',
        ]);

        Bill::create([
            'product_detail' => $product_detail,
            'total_price' => $total_price,
            'site_id' => $this->site_id,
            'remaining_amount' => $total_price
        ]);
        session()->flash('message', 'Bill successfully created.');
        return redirect()->route('bill.index');
    }
}
