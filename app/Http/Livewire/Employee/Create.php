<?php

namespace App\Http\Livewire\Employee;
use App\Actions\Fortify\PasswordValidationRules;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class Create extends Component
{
    use PasswordValidationRules;
    public $name;
    public $email;
    public $phone;
    public $password;
    public $password_confirmation;

    public function render()
    {
        return view('livewire.employee.create');
    }
    public function store(){
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => 'required|digits:11,11',
            'password' => $this->passwordRules(),
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => Hash::make($this->password),
        ]);
        session()->flash('message', 'Employee successfully created.');
        return redirect()->route('employee.index');
    }
}
