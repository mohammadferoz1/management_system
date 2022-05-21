<?php

namespace App\Http\Livewire\Bill;
use App\Models\PaymentLedger;
use App\Models\Bill;

use Livewire\Component;

class MakeLedger extends Component
{
    public $bill_id;
    public $payment;
    public $bill;
    public function mount($id)
    {
        $this->bill_id = $id;
        $this->payment = 0;
        $this->bill = Bill::find($id);
    }
    public function render()
    {
        return view('livewire.bill.make-ledger');
    }
    public function store(){
        $this->validate([
            'payment' => 'required|integer|lte:'.$this->bill->credit,
        ]);
        PaymentLedger::create([
            'bill_id' => $this->bill_id,
            'payment' => $this->payment,
        ]);

        $bill = Bill::find($this->bill_id);
        $bill->credit = ($bill->credit)-$this->payment;
        $bill->debit += $this->payment;
        if($bill->credit == 0){
            $bill->status = 'paid';
        }
        $bill->save();

        
        session()->flash('message', 'Bill Ledger Successfully created.');
        return redirect()->route('bill.index');
        
    }
}