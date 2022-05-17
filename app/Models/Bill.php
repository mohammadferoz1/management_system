<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    public $table = 'bills';
    protected $fillable = ['status', 'product_detail', 'total_price', 'site_id', 'remaining_amount'];
    public function site()
    {
        return $this->belongsTo(Site::class, 'site_id');
    }
    use HasFactory;
}
