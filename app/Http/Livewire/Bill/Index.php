<?php

namespace App\Http\Livewire\Bill;
use App\Models\Bill;

use Livewire\Component;

class Index extends Component
{
    public $search;
    protected $queryString = [
        'search'  => ['except' => ''],
    ];
    public function render()
    {
        $bills = Bill::where('id', 'like', '%'.$this->search.'%')
        ->orWhere('total_price', 'like', '%'.$this->search.'%')
        ->orWhere('status', 'like', '%'.$this->search.'%')
        ->orWhere('credit', 'like', '%'.$this->search.'%')
        ->orWhere('debit', 'like', '%'.$this->search.'%')
        ->orWhere('site_type', 'like', '%'.$this->search.'%')
        ->orWhere('created_at', 'like', '%'.$this->search.'%')
        ->orWhere(function ($query) {
            $query->where('site_type', 'non_contracted')->whereHas('site', function ($query) {
                $query->where('name', 'like', '%'.$this->search.'%');
            });
        })->orWhere(function ($query) {
            $query->where('site_type', 'contracted')->whereHas('contractedsite', function ($query) {
                $query->where('name', 'like', '%'.$this->search.'%');
            });
        })->orderBy('created_at', 'desc');

        $bills = $bills->paginate(10);
        return view('livewire.bill.index',  ['bills' => $bills]);
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
