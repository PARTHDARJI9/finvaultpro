<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Loan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'client_id', 'loan_number', 'principal_amount', 'interest_rate', 
        'interest_type', 'tenure_months', 'total_payable', 'monthly_emi', 
        'status', 'disbursement_date', 'next_due_date', 'tenant_id'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function emis()
    {
        return $this->hasMany(Emi::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
