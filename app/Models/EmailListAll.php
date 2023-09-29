<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailListAll extends Model
{
    use HasFactory;
    protected $fillable = [
        'idEmailListNames',
        'Emri',
        'Email',
        'CreatedAt',
        'UpdatedAt'
    ];
}
