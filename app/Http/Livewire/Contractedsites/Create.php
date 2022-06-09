<?php

namespace App\Http\Livewire\Contractedsites;

use Livewire\Component;
use App\Models\ContractedSites;
use Auth;

class Create extends Component
{
    public $name;
    public $address;
    public $amount_taken;
    public $contracted_amount;
    public $start_at;
    public $end_at;
    public $phone;
    public $email;
    public $description;
    public function render()
    {
        return view('livewire.contractedsites.create');
    }
    public function store(){
        $validatedData = $this->validate([
            'name' => 'required',
            'description' => 'required',
            'phone' => 'required|digits:11,11',
            'start_at' => 'required',
            'end_at' => 'required',
            'amount_taken' => 'required|integer',
            'contracted_amount' => 'required|integer',
            'email' => 'nullable',
            'description' => 'nullable',
        ]);
        ContractedSites::create([
            'name' => $this->name,
            'start_at' => $this->start_at,
            'end_at' => $this->end_at,
            'amount_taken' => $this->amount_taken,
            'contracted_amount' =>  $this->contracted_amount,
            'credit' => ($this->contracted_amount-$this->amount_taken),
            'phone' => $this->phone,
            'email' => $this->email,
            'address' => $this->address,
            'description' => $this->description,
            'user_id'  => Auth::id()
        ]);
        session()->flash('message', 'Site successfully created.');
        return redirect()->route('contracted_site.index');
    }
}
