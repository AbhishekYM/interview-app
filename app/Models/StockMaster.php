<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockMaster extends Model
{
    use HasFactory,SoftDeletes,HasAdvancedFilter;
    protected $orderable = [
        'id',
        'branch_id',
        'status',
        'item_code',
        'item_name',
        'quantity',
        'location',
        'in_stock_date',
    ];
    
    protected $filterable = [
        'id',
        'branch_id',
        'item_code',
        'status',
        'item_name',
        'quantity',
        'location',
        'in_stock_date',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $fillable = [
        'branch_id',
        'item_code',
        'item_name',
        'status',
        'quantity',
        'location',
        'in_stock_date',
    ];
    public function branch()
    {
        return $this->belongsTo(StoreBranch::class, 'branch_id');
    }
}
