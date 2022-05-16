<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;
use App\Models\Site;
use Auth;

class Create extends Component
{
    public $name;
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
        ]);
        Site::create([
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'address' => $this->address,
            'description' => $this->description,
            'user_id'  => Auth::id()
        ]);
        session()->flash('message', 'Site successfully created.');
        return redirect()->route('site.index');
    }
}
