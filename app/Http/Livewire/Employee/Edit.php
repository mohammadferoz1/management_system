<?php

namespace App\Http\Livewire\Employee;

use Livewire\Component;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\User;
use Hash;

class Edit extends Component
{
    use PasswordValidationRules;
    public $employee;
    public $name;
    public $email;
    public $phone;
    public $password;
    public $password_confirmation;
    public function mount($id){
        $this->employee = User::whereGroup('employee')->find($id);
        $this->name = $this->employee->name;
        $this->email = $this->employee->email;
        $this->phone = $this->employee->phone;
    }
    public function render()
    {
        return view('livewire.employee.edit');
    }
    public function update(){
        if($this->password)
            $this->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'max:255', 'unique:users,email,'.$this->employee->id],
                'phone' => 'required|digits:11,11',
                'password' => $this->passwordRules(),
            ]);
        else
        {
            $this->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'max:255', 'unique:users,email,'.$this->employee->id],
                'phone' => 'required|digits:11,11',
            ]);
        }
        $new_password = '';
        if($this->password)
        {
            $new_password = Hash::make($this->password);
        }
        else
        {
            $new_password = $this->employee->password;
        }
        $this->employee->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => $new_password
        ]);
        session()->flash('message', 'Employee successfully updated.');
        return redirect()->route('employee.index');
    }
}
