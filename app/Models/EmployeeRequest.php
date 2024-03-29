<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeRequest extends Model
{
    public $table = 'employee_request';
    protected $fillable = ['name', 'user_id', 'description', 'status', 'site_id'];
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function site()
    {
        return $this->belongsTo(Site::class, 'site_id');
    }
}
