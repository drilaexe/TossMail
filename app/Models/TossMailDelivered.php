<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TossMailDelivered extends Model
{
    use HasFactory;
    protected $table = 'TossMailDelivered';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'TossMailId',
        'Delivered',
        'ListaId',
        'ListaEmailId',
        'UserId',
        'CreatedAt'
    ];
}
