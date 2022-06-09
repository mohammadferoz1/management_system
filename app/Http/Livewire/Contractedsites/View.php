<?php

namespace App\Http\Livewire\Contractedsites;

use Livewire\Component;
use App\Models\ContractedSites;

class View extends Component
{
    public $site;
    public $amount_taken;
    public $contracted_amount;
    public $start_at;
    public $end_at;
    public $name;
    public $address;
    public $phone;
    public $email;
    public $description;
    public function mount($id){
        $this->site = ContractedSites::find($id);
        $this->name = $this->site->name;
        $this->address = $this->site->address;
        $this->email = $this->site->email;
        $this->description = $this->site->description;
        $this->phone = $this->site->phone;
        $this->start_at = $this->site->start_at;
        $this->end_at = $this->site->end_at;
        $this->amount_taken = $this->site->amount_taken;
        $this->contracted_amount = $this->site->contracted_amount;
        $this->render();
    }
    public function render()
    {
        return view('livewire.contractedsites.view');
    }
}
