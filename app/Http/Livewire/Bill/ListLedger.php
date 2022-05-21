<?php

namespace App\Http\Livewire\Bill;

use Livewire\Component;
use App\Models\Bill;

class ListLedger extends Component
{
    public $ledger;
    public function mount($id)
    {
        $this->ledger = Bill::find($id)->ledger;
    }
    public function render()
    {
        return view('livewire.bill.list-ledger');
    }
}
