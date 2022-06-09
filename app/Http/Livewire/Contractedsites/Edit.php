<?php

namespace App\Http\Livewire\Contractedsites;

use Livewire\Component;
use App\Models\ContractedSites;
use Auth;

class Edit extends Component
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
        return view('livewire.contractedsites.edit');
    }
    public function update(){
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
        ContractedSites::find($this->site->id)->update([
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
        session()->flash('message', 'Site successfully Updated.');
        return redirect()->route('contracted_site.index');
    }
}
