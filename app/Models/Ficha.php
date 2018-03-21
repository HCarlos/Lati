<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Fichafile;

class Ficha extends Model
{
    use Notifiable;

    protected $guard_name = 'web';

    protected $table = 'fichas';

    protected $fillable = [
        'fecha','fecha_mod','datos_fijos',
        'etiqueta_marc','tipo_material','isbn','titulo',
        'autor','clasificacion','status','no_coleccion',
        'prestado','fecha_salida','fecha_entrega',
        'observaciones','idemp','status_ficha','ip','host'
        ];

    protected $casts = ['prestado'=>'boolean'];


//    public function fichafiles(){
//        return $this->belongsToMany(Fichafile::class);
//    }

    public function fichafiles(){
        return $this->hasMany(Fichafile::class,'ficha_id');
    }

    public function isPrestado(){
        return $this->prestado;
    }

    public function getExistencia(){
        return $this::whereIsbn($this->isbn)->where('prestado',false)->count();
    }

}
