<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeExpense extends Model
{
    public $table = 'employees_expense';
    protected $fillable = ['name', 'type', 'price', 'employee_id'];
    use HasFactory;
}
