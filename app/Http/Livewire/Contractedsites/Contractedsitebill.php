<?php

namespace App\Http\Livewire\Contractedsites;

use Livewire\Component;
use App\Models\Bill;
use App\Models\ContractedSites;

class Contractedsitebill extends Component
{
    public $bills;
    public $site;
    public $i;
    public function mount($id){
        $this->bills = Bill::where('site_id', $id)->get();
        $this->site = ContractedSites::find($id);
        $this->i++;
    }
    public function render()
    {
        return view('livewire.contractedsites.contractedsitebill');
    }
}
