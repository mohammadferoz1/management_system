<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use carbon\Carbon;

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
    public function checkIfBlackList(){
        $expDate = Carbon::now()->subDays(30);
        $unpaidBills = Bill::whereSiteId($this->id)->whereStatus('unpaid')->whereDate('created_at', '<',$expDate)->count();
        $unpaidBillCount = Bill::whereSiteId($this->id)->whereStatus('unpaid')->count();
        return [$unpaidBills, $unpaidBillCount];
    }
    use HasFactory;

}
