<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bill;
use App\Models\Site;
use App\Models\HomeExpense;
use App\Models\EmployeeExpense;
use App\Models\EmployeeRequest;
use App\Models\ContractedSites;
use App\Models\Task;
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
    public $requestforapproval;
    public $requesttobecompleted;
    public $pending_task;
    public $con_sites_recovery;
    public $main_sites_recovery;
    public $tasks;
    public $bills;
    public $heading;


    public function mount(){
        $this->requestforapproval = EmployeeRequest::whereStatus('waiting_for_approval')->get()->count();
        $this->requesttobecompleted = EmployeeRequest::whereStatus('approved_and_in_pending')->get()->count();
        $this->pending_task = Task::whereStatus('pending')->get()->count();
        $this->con_sites_recovery = ContractedSites::where('debit', '>' , 'recovery')->get()->count();
        $this->paid_amount = Bill::where('debit', '>' , '0')->sum('debit');
        $this->unpaid_amount = Bill::where('credit', '>' , '0')->sum('credit');
        $this->zakat = ($this->paid_amount * 2.5)/100;
        $this->employeeExpense = EmployeeExpense::sum('price');
        $this->homeExpense = HomeExpense::sum('price');
        $this->totalExpense = $this->homeExpense + $this->employeeExpense;
        $this->blackListSites = Site::where('credit', '>', 'blacklist')->get();
        $this->main_sites_recovery = Site::where('credit', '>', 'blacklist')->get()->count();
        $this->tasks = Task::whereDate('created_at', Carbon::today())->get();
        $this->bills = Bill::whereDate('created_at', Carbon::today())->get();
        $this->mEmployeeExpense = EmployeeExpense::whereDate('created_at', Carbon::today())->sum('price');
        $this->mHomeExpense = HomeExpense::whereDate('created_at', Carbon::today())->sum('price');
        $this->mTotalExpense = $this->mHomeExpense + $this->mEmployeeExpense;
        $this->mPaid_amount = Bill::where('debit', '>' , '0')->whereDate('created_at', Carbon::today())->sum('debit');
        $this->mUnpaid_amount = Bill::where('credit', '>' , '0')->whereDate('created_at', Carbon::today())->sum('credit');
        $this->heading = "Today";

        if(Auth::user()->group == "employee")
        {
            return redirect()->route("employee-task-unaccepted.index");
        }
    }
    public function render()
    {
            return view('livewire.dashboard');
    }
    public function today(){
        $this->heading = "Today";
        $this->tasks = Task::whereDate('created_at', Carbon::today())->get();
        $this->bills = Bill::whereDate('created_at', Carbon::today())->get();
        $this->mEmployeeExpense = EmployeeExpense::whereDate('created_at', Carbon::today())->sum('price');
        $this->mHomeExpense = HomeExpense::whereDate('created_at', Carbon::today())->sum('price');
        $this->mTotalExpense = $this->mHomeExpense + $this->mEmployeeExpense;
        $this->mPaid_amount = Bill::where('debit', '>' , '0')->whereDate('created_at', Carbon::today())->sum('debit');
        $this->mUnpaid_amount = Bill::where('credit', '>' , '0')->whereDate('created_at', Carbon::today())->sum('credit');

    }
    public function yesterday(){
        $this->heading = "Yesterday";
        $this->tasks = Task::where('created_at', Carbon::yesterday())->get();
        $this->bills = Bill::where('created_at', Carbon::yesterday())->get();
        $this->mEmployeeExpense = EmployeeExpense::where('created_at', Carbon::yesterday())->sum('price');
        $this->mHomeExpense = HomeExpense::where('created_at', Carbon::yesterday())->sum('price');
        $this->mTotalExpense = $this->mHomeExpense + $this->mEmployeeExpense;
        $this->mPaid_amount = Bill::where('debit', '>' , '0')->where('created_at', Carbon::yesterday())->sum('debit');
        $this->mUnpaid_amount = Bill::where('credit', '>' , '0')->where('created_at', Carbon::yesterday())->sum('credit');
    }
    public function thisMonth(){
        $this->heading = "This Month";
        $this->tasks = Task::whereMonth('created_at', Carbon::now()->month)->get();
        $this->bills = Bill::whereMonth('created_at', Carbon::now()->month)->get();
        $this->mEmployeeExpense = EmployeeExpense::whereMonth('created_at', Carbon::now()->month)->sum('price');
        $this->mHomeExpense = HomeExpense::whereMonth('created_at', Carbon::now()->month)->sum('price');
        $this->mTotalExpense = $this->mHomeExpense + $this->mEmployeeExpense;
        $this->mPaid_amount = Bill::where('debit', '>' , '0')->whereMonth('created_at', Carbon::now()->month)->sum('debit');
        $this->mUnpaid_amount = Bill::where('credit', '>' , '0')->whereMonth('created_at', Carbon::now()->month)->sum('credit');

    }
    public function prevMonth(){
        $this->heading = "Previous Month";
        $this->tasks = Task::where('created_at', Carbon::now()->subMonth())->get();
        $this->bills = Bill::where('created_at', Carbon::now()->subMonth())->get();
        $this->mEmployeeExpense = EmployeeExpense::where('created_at', Carbon::now()->subMonth())->sum('price');
        $this->mHomeExpense = HomeExpense::where('created_at', Carbon::now()->subMonth())->sum('price');
        $this->mTotalExpense = $this->mHomeExpense + $this->mEmployeeExpense;
        $this->mPaid_amount = Bill::where('debit', '>' , '0')->where('created_at', Carbon::now()->subMonth())->sum('debit');
        $this->mUnpaid_amount = Bill::where('credit', '>' , '0')->where('created_at', Carbon::now()->subMonth())->sum('credit');
    }
}
