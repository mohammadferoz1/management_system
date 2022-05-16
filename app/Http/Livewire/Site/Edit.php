<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;
use App\Models\Site;
use Auth;

class Edit extends Component
{
    public $site;
    public $name;
    public $address;
    public $phone;
    public $email;
    public $description;
    public function mount($id){
        $this->site = Site::find($id);
        $this->name = $this->site->name;
        $this->address = $this->site->address;
        $this->email = $this->site->email;
        $this->description = $this->site->description;
        $this->phone = $this->site->phone;
        $this->render();
    }
    public function render()
    {
        return view('livewire.site.edit');
    }
    public function update(){
        $validatedData = $this->validate([
            'name' => 'required',
            'description' => 'required',
            'phone' => 'required|digits:11,11',
            'email' => 'nullable',
            'description' => 'nullable',
        ]);
        Site::find($this->site->id)->update([
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'address' => $this->address,
            'description' => $this->description,
            'user_id'  => Auth::id()
        ]);
        session()->flash('message', 'Site successfully updated.');
        return redirect()->route('site.index');
    }
}
