<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;
use App\Models\Site;

class Index extends Component
{
    public $search;
    protected $queryString = [
        'search'  => ['except' => ''],
    ];

    public function render()
    {
        $sites = Site::where('name', 'like', '%'.$this->search.'%')
        ->orWhere('email', 'like', '%'.$this->search.'%')
        ->orWhere('address', 'like', '%'.$this->search.'%')
        ->orWhere('debit', 'like', '%'.$this->search.'%')
        ->orWhere('credit', 'like', '%'.$this->search.'%')
        ->orWhere('phone', 'like', '%'.$this->search.'%')
        ->orWhere('created_at', 'like', '%'.$this->search.'%')
        ->orderBy('created_at', 'desc');
        $sites = $sites->paginate(10);
        return view('livewire.site.index', ['sites' => $sites]);
    }
    public function create(){

        return redirect()->route('site.create');
    }
    public function edit($id){
        return redirect()->route('site.edit', $id);
    }
    public function bills($id){
        return redirect()->route('site.site-bill', $id);
    }
}
