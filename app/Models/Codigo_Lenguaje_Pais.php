<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Codigo_Lenguaje_Pais extends Model
{
    use Notifiable;

    protected $guard_name = 'web';

    protected $table = 'codigo_lenguaje_paises';
    protected $fillable = [
        'idmig','codigo','lenguaje',
        'tipo','idemp','status_lenguaje',
    ];

}
