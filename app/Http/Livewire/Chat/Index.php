<?php

namespace App\Http\Livewire\Chat;

use Livewire\Component;
use App\Models\Chat;
use Auth;

class Index extends Component
{
    public $employee_id;
    public $message;
    public $getMessages;
    public function mount($id)
    {
        $this->employee_id = $id;
        $this->getMessages = Chat::whereEmployeeId($this->employee_id)->get();
    }
    public function render()
    {
        return view('livewire.chat.index');
    }
    public function sendMessage(){
        $this->validate([
            'message' => 'required',
        ]);
        Chat::create([
            'admin_id' => 1,
            'employee_id' => $this->employee_id,
            'message' => $this->message,
            'sender_id' => Auth::id()

        ]);
        $this->getMessages = Chat::whereEmployeeId($this->employee_id)->get();
        $this->message = "";
    }
}
