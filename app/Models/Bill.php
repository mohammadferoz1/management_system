<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    public $table = 'bills';
    protected $fillable = ['status', 'product_detail', 'total_price', 'site_id', 'debit', 'credit', 'pdf_link', 'site_type', 'user_id'];
    public function site()
    {
        return $this->belongsTo(Site::class, 'site_id');
    }
    public function contractedsite()
    {
        return $this->belongsTo(ContractedSites::class, 'site_id');
    }
    public function ledger(){
        return $this->hasMany(PaymentLedger::class, 'bill_id');
    }
    use HasFactory;
}
