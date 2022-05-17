<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public $table = 'tasks';
    protected $fillable = ['name', 'site_id', 'created_by','start_at', 'end_at', 'num_of_workers', 'status'];
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function site()
    {
        return $this->belongsTo(Site::class, 'site_id');
    }
    public function taskEmployees(){
        return $this->hasMany(TaskEmployee::class);
    }
    use HasFactory;
}
