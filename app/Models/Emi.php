<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emi extends Model
{
    use HasFactory;

    protected $fillable = [
        'loan_id', 'amount', 'principal_component', 'interest_component', 
        'due_date', 'paid_date', 'status', 'overdue_penalty', 'tenant_id'
    ];

    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }
}
