<?php

namespace App\Http\Livewire\Bill;

use App\Models\Site;
use App\Models\ContractedSites;
use Livewire\Component;
use App\Models\Bill;
use App\Models\Product;
use PDF;
use Storage;
use Auth;
use Carbon\Carbon;

class Create extends Component
{
    public $sites = [];
    public $products= [];
    public $prices = [];
    public $site_id;
    public $siteSelect;
    public $getProducts;

    public function mount(){
        $this->products = [];
        $this->prices = [];
        $this->optionCount = 1;
        $this->getProducts = Product::all();

    }
    public function getPrice($i){
        $price = Product::find($this->products[$i]);
        $this->prices[$i] = $price->price;
    }
    public function selectedOption(){
        if($this->siteSelect == 'non_contracted'){
            $this->sites = Site::all();
        }
        else{
            $this->sites = ContractedSites::all();
        }
    }
    public function render()
    {
        return view('livewire.bill.create');
    }
    public function store(){
        $product_detail = [];
        $total_price = 0;
        foreach($this->prices as $price){
            $total_price += $price;
        }
        for($i = 0 ; $i < count($this->products); $i++)
        {
            array_push($product_detail, array("name" => $this->products[$i], "price" => $this->prices[$i]));
        }
        $product_detail_json = json_encode($product_detail);
        $this->validate([
            'site_id' => 'required',
        ]);
        if($this->siteSelect == "non_contracted"){
            $site = Site::find($this->site_id);
            $site->credit += $total_price;
            $site->save();
        }
        else{
            $site = ContractedSites::find($this->site_id);
        }


        $path = '/pdfBills/bill('.now()->timestamp.').pdf';
        $bill = Bill::create([
            'product_detail' => $product_detail_json,
            'site_type' => $this->siteSelect,
            'user_id' => Auth::user()->id,
            'total_price' => $total_price,
            'site_id' => $this->site_id,
            'credit' => $total_price,
            'user_id' => Auth::id(),
            'pdf_link' => '/storage'.$path
        ]);
        $all_data = [];
        $all_data = ["product_detail" => $product_detail, "site_name" => $site->name,
        "generation_date" => $bill->created_at, "total_price" => $total_price, "bill_id" => $bill->id, "site" => $site];
        $pdf = PDF::loadView('billPDF', $all_data)->setOptions(['defaultFont' => 'sans-serif']);
        Storage::put('public'.$path, $pdf->output());
        if(Auth::user()->group == "admin")
        {
            session()->flash('message', 'Bill successfully created.');
            return redirect()->route('bill.index');
        }
        else
        {
            session()->flash('message', 'Your bill request is successfull created.');
            return redirect()->route('employee-task-unaccepted.index');
        }

    }
}
