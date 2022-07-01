<?php

namespace App\Http\Livewire\Bill;

use Livewire\Component;
use App\Models\Bill;
use Illuminate\Validation\Rule;

class BillById extends Component
{
    public $bill_id;
    public function render()
    {
        return view('livewire.bill.bill-by-id');
    }
    public function viewPDFBill(){
        $this->validate([
            'bill_id' => ['required', Rule::exists('bills', 'id')                     
            ->where('id', $this->bill_id),    ]
        ]);
        $bill = Bill::find($this->bill_id);
        return redirect()->away($bill->pdf_link);
    }
}
