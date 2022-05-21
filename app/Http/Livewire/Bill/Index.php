<?php

namespace App\Http\Livewire\Bill;
use App\Models\Bill;

use Livewire\Component;

class Index extends Component
{
    public $bills;
    public function mount(){
        $this->bills = Bill::all();
    }
    public function render()
    {
        return view('livewire.bill.index');
    }
    public function create(){

        return redirect()->route('bill.create');
    }
    public function edit($id){
        return redirect()->route('bill.edit', ['id' => $id]);
    }
    public function makeLedger($id){
        return redirect()->route('bill.makeLedger', ['id' => $id]);
    }
    public function listLedger($id){
        return redirect()->route('bill.listLedger', ['id' => $id]);
    }
}
