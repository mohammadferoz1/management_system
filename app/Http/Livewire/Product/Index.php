<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Product;
class Index extends Component
{
    public $search;
    protected $queryString = [
        'search'  => ['except' => ''],
    ];
    public function render()
    {
        $products = Product::where('name', 'like', '%'.$this->search.'%')
        ->orWhere('price', 'like', '%'.$this->search.'%')
        ->orWhere('created_at', 'like', '%'.$this->search.'%')
        ->orderBy('created_at', 'desc');

        $products = $products->paginate(10);
        return view('livewire.product.index', ['products' => $products]);
    }
    public function create(){

        return redirect()->route('product.create');
    }
    public function edit($id){
        return redirect()->route('product.edit', $id);
    }
}
