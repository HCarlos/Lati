<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Fichafile;

class Ficha extends Model
{
    use Notifiable;

    protected $guard_name = 'web';

    protected $table = 'fichas';
    protected $editoriales = [];

    protected $fillable = [
        'fecha','fecha_mod','datos_fijos',
        'etiqueta_marc','tipo_material','isbn','titulo',
        'autor','clasificacion','status','no_coleccion',
        'prestado','fecha_salida','fecha_entrega',
        'observaciones', 'editorial_id','fecha_apartado',
        'apartado','apartado_user_id','prestado_user_id',
        ];

    protected $hidden = ['idemp','status_ficha','ip','host','created_at', 'updated_at',];
    protected $casts = ['prestado'=>'boolean','apartado'=>'boolean',];

    public function editoriales(){
        return $this->hasOne(Editorial::class,'editorial_id');
    }

    public function apartador(){
        return $this->hasMany(User::class,'apartado_user_id');
    }

    public function prestador(){
        return $this->hasMany(User::class,'prestado_user_id');
    }

    public function isPrestado(){
        return $this->prestado;
    }

    public function isApartado(){
        return $this->apartado;
    }

    public function getFichasApartadas(){
        return $this::whereApartado(true)->get();
    }

    public function getExistencia(){
        return $this::whereIsbn($this->isbn)->where('prestado',false)->count();
    }

    public function getEditorial(){
        return Editorial::findOrFail($this->editorial_id)->first();
    }

    public function hasImages(){
        return Fichafile::all()->where('isbn',$this->isbn)->get();
    }

    public function isImages(){
        return Fichafile::all()->where('isbn',$this->isbn)->count() > 0 ? true : false;
    }

    public function cuantasImages(){
        return Fichafile::all()->where('isbn',$this->isbn)->count();
    }

    public static function hasIsbnWithImages($isbn=''){
        return Fichafile::select('root','filename','ficha_id')->where('isbn',$isbn)->get();
    }

    public function scopeSearch($query, $search){
        if (!$search) {
            return $query;
        }
        return $query->whereRaw("searchtext @@ to_tsquery('english', ?)", [$search])
            ->orderByRaw("ts_rank(searchtext, to_tsquery('english', ?)) DESC", [$search]);
    }

}
