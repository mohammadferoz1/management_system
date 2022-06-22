<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    public $table = 'Chat';
    protected $fillable = ['message', 'admin_id', 'employee_id', 'sender_id'];
    
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
    use HasFactory;
}
