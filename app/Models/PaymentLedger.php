<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentLedger extends Model
{
    public $table = 'payments_ledger';
    protected $fillable = ['payment', 'bill_id'];

    public function bill(){
        return $this->belongsTo(Bill::class, 'bill_id');
    }
    use HasFactory;
}
