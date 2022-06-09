<?php

namespace App\Http\Livewire\Contractedsites;

use Livewire\Component;
use App\Models\ContractedSites;

class Index extends Component
{
    public $contracted_sites;
    public function mount(){
        $this->contracted_sites = ContractedSites::all();
    }
    public function render()
    {
        return view('livewire.contractedsites.index');
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
