<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TossMail extends Model
{
    use HasFactory;
    protected $table = 'TossMail';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'Emertimi',
        'Subjekti',
        'ListaId',
        'Pershkrimi',
        'UserId',
        'CreatedAt'
    ];
}
