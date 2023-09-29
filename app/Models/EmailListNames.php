<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailListNames extends Model
{
    use HasFactory;
    protected $table = 'EmailListNames';

    protected $primaryKey = 'idEmailListNames';
    public $timestamps = false;

    protected $fillable = [
        'Emertimi',
        'UserId',
        'CreatedAt',
        'UpdatedAt'
    ];
}
