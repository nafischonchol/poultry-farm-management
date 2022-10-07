<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cost extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'shop_id',
        'sheet_no',
        'shop_address',
        'date',
        'category',
        "category_onno",
        'name',
        'note',
        'price',
        'qty',
        'bonus_qty',
        'status'
    ];
}
