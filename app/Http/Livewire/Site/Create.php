<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;
use App\Models\Site;
use Auth;

class Create extends Component
{
    public $name;
    public $good;
    public $allowed;
    public $excellent;
    public $blacklist;
    public $address;
    public $phone;
    public $email;
    public $description;

    public function render()
    {
        return view('livewire.site.create');
    }
    public function store(){
        $validatedData = $this->validate([
            'name' => 'required',
            'description' => 'required',
            'phone' => 'required|digits:11,11',
            'email' => 'nullable',
            'description' => 'nullable',
            'blacklist' => 'required',
            'allowed' => 'lt:blacklist|required',
            'good' => 'lt:blacklist|lt:allowed|required',
            'excellent' => 'lt:blacklist|lt:allowed|lt:good|required',
        ]);
        Site::create([
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'blacklist' => $this->blacklist,
            'good' => $this->good,
            'allowed' => $this->allowed,
            'excellent' => $this->excellent,
            'address' => $this->address,
            'description' => $this->description,
            'user_id'  => Auth::id()
        ]);
        session()->flash('message', 'Site successfully created.');
        return redirect()->route('site.index');
    }
}
