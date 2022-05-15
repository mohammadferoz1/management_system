<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;
use App\Models\Site;

class Index extends Component
{
    public $sites;
    public function mount(){
        $this->sites = Site::all();
    }
    public function render()
    {
        return view('livewire.site.index');
    }
    public function create(){
        
        return redirect()->route('site.create');
    }
}
