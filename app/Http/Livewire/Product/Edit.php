<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Product;

class Edit extends Component
{
    public $product_detail;
    public $name;
    public $price;

    public function mount($id){
        $this->product_detail = Product::find($id);
        $this->name = $this->product_detail->name;
        $this->price = $this->product_detail->price;
    }
    public function render()
    {
        return view('livewire.product.edit');
    }
    public function update(){
        $this->validate([
            'name' => 'required|string',
            'price' => 'required|integer'
        ]);
        Product::find($this->product_detail->id)->update([
            'name' => $this->name,
            'price' => $this->price,
        ]);
        session()->flash('message', 'Products successfully updated.');
        return redirect()->route('product.index');
    }
}
