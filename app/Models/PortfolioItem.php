<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'asset_name', 'invested_amount', 'current_value', 'category', 
        'expected_roi', 'status', 'investment_date', 'tenant_id'
    ];
}
