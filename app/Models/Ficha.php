<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Ficha extends Model
{
    use Notifiable;

    protected $guard_name = 'web';

    protected $table = 'fichas';
    protected $fillable = [
        'fecha','fecha_mod','datos_fijos',
        'etiqueta_marc','tipo_material','isbn','titulo',
        'autor','clasificacion','status','no_coleccion',
        ];

//    protected $hidden = ['etiqueta_marc',];

}
