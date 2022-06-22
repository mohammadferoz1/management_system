<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bill;
use App\Models\Site;
use App\Models\HomeExpense;
use App\Models\EmployeeExpense;
use carbon\Carbon;
use Auth;

class Dashboard extends Component
{
    public $paid_amount;
    public $unpaid_amount;
    public $zakat;
    public $blackListSites;
    public $homeExpense;
    public $employeeExpense;
    public $totalExpense;
    public $mHomeExpense;
    public $mEmployeeExpense;
    public $mTotalExpense;
    public $mPaid_amount;
    public $mUnpaid_amount;

    public function mount(){
        $this->paid_amount = Bill::where('debit', '>' , '0')->sum('debit');
        $this->unpaid_amount = Bill::where('credit', '>' , '0')->sum('credit');
        $this->zakat = ($this->paid_amount * 2.5)/100;
        $this->employeeExpense = EmployeeExpense::sum('price');
        $this->homeExpense = HomeExpense::sum('price');
        $this->totalExpense = $this->homeExpense + $this->employeeExpense;
        $this->blackListSites = Site::get();
        $this->mEmployeeExpense = EmployeeExpense::whereMonth('created_at', Carbon::now()->month)->sum('price');
        $this->mHomeExpense = HomeExpense::whereMonth('created_at', Carbon::now()->month)->sum('price');
        $this->mTotalExpense = $this->mHomeExpense + $this->mEmployeeExpense;
        $this->mPaid_amount = Bill::where('debit', '>' , '0')->whereMonth('created_at', Carbon::now()->month)->sum('debit');
        $this->mUnpaid_amount = Bill::where('credit', '>' , '0')->whereMonth('created_at', Carbon::now()->month)->sum('credit');
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
