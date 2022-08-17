<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeExpense extends Model
{
    public $table = 'home_expense';
    protected $fillable = ['name', 'price'];
    use HasFactory;
}
