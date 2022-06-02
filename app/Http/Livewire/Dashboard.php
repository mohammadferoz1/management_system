<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bill;
use App\Models\Site;
use carbon\Carbon;
use Auth;

class Dashboard extends Component
{
    public $paid_amount;
    public $unpaid_amount;
    public $zakat;
    public $blackListSites;

    public function mount(){
        $this->paid_amount = Bill::where('debit', '>' , '0')->sum('debit');
        $this->unpaid_amount = Bill::where('credit', '>' , '0')->sum('credit');
        $this->zakat = ($this->paid_amount * 2.5)/100;
        $this->blackListSites = Site::get();
        if(Auth::user()->group == "employee")
        {
            return redirect()->route("employee-task-unaccepted.index");
        }
    }
    public function render()
    {
            return view('livewire.dashboard');
    }
}
