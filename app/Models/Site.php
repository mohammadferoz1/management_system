<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    public $table = 'sites';
    protected $fillable = ['name', 'profit', 'loss', 'debit', 'credit', 'address', 'phone', 'email', 'description', 'user_id'];
    public function bills()
    {
        return $this->hasMany(Bill::class, 'site_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function tasks()
    {
        return $this->hasMany(Task::class, 'site_id');
    }
    use HasFactory;

}
