<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractedSites extends Model
{
    public $table = 'contracted_sites';
    protected $fillable = ['name', 'amount_taken', 'contracted_amount', 'start_at', 'end_at', 'debit', 'credit', 'address', 'phone', 'email', 'description', 'user_id'];
    use HasFactory;
}
