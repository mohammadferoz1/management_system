<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;
use App\Models\Bill;
use App\Models\Site;

class SiteBill extends Component
{
    public $bills;
    public $site;
    public $i;
    public function mount($id){
        $this->bills = Bill::where('site_id', $id)->get();
        $this->site = Site::find($id);
        $this->i++;
    }
    public function render()
    {
        return view('livewire.site.site-bill');
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
    public function delete($id){

        $bill = Bill::find($id)->delete();
        session()->flash('message', 'Deleted Successfully');
        return redirect()->back();
    }
}
