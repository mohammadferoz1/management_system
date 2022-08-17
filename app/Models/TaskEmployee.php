<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskEmployee extends Model
{
    public $table = 'task_employees';
    protected $fillable = ['user_id', 'task_id'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    use HasFactory;
}
