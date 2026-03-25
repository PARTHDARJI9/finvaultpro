<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountingLedger extends Model
{
    use HasFactory;

    protected $table = 'accounting_ledger';

    protected $fillable = [
        'type', 'category', 'amount', 'entry_date', 'description', 'tenant_id'
    ];
}
