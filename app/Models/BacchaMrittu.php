<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BacchaMrittu extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'sheet_no',
        "qty",
        "reason",
        'date'
    ];
}
