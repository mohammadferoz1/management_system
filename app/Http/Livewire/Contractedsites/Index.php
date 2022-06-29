<?php

namespace App\Http\Livewire\Contractedsites;

use Livewire\Component;
use App\Models\ContractedSites;

class Index extends Component
{
    public $search;
    protected $queryString = [
        'search'  => ['except' => ''],
    ];

    public function render()
    {
        $contracted_sites = ContractedSites::where('name', 'like', '%'.$this->search.'%')
        ->orWhere('email', 'like', '%'.$this->search.'%')
        ->orWhere('address', 'like', '%'.$this->search.'%')
        ->orWhere('phone', 'like', '%'.$this->search.'%')
        ->orWhere('contracted_amount', 'like', '%'.$this->search.'%')
        ->orWhere('amount_taken', 'like', '%'.$this->search.'%')
        ->orWhere('credit', 'like', '%'.$this->search.'%')
        ->orWhere('debit', 'like', '%'.$this->search.'%')
        ->orWhere('start_at', 'like', '%'.$this->search.'%')
        ->orWhere('end_at', 'like', '%'.$this->search.'%')
        ->orWhere('created_at', 'like', '%'.$this->search.'%')
        ->orderBy('created_at', 'desc');
        $contracted_sites = $contracted_sites->paginate(10);
        return view('livewire.contractedsites.index', ['contracted_sites' => $contracted_sites]);
    }
    public function create(){
        return redirect()->route('contracted_site.create');
    }
    public function edit($id){
        return redirect()->route('contracted_site.edit', $id);
    }
    public function view($id){
        return redirect()->route('contracted_site.view', $id);
    }
    public function bills($id){
        return redirect()->route('contracted_site.site-bill', $id);
    }
}
