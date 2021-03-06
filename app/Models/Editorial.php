<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Editorial extends Model
{
    use Notifiable;

    protected $guard_name = 'web'; // or whatever guard you want to use

    protected $table = 'editoriales';
    protected $fillable = ['editorial','representante','no','predeterminado'];
    protected $casts = ['predeterminado'=>'boolean'];
    protected $hidden = ['created_at', 'updated_at'];

    public function fichas() {
        return $this->belongsToMany(Ficha::class,'editorial_id');
    }

    public function isPredeterminado(){
        return $this->predeterminado == Null ? false : true;
    }

    public function deletePredeterminado(){
        return $this::where('predeterminado', true)->update(['predeterminado'=>false]);
    }

    public function setPredeterminado(){
        return $this::update(['predeterminado'=>true]);
    }

}
