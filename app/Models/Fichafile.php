<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ficha;
use Illuminate\Notifications\Notifiable;

class Fichafile extends Model
{
    use Notifiable;

    protected $guard_name = 'web';

    protected $table = 'fichafiles';
    protected $fillable = [
        'ficha_id','isbn','root','filename','num',
    ];
    protected $hidden = ['created_at', 'updated_at'];

    public function fichasFiles(){
        return $this->hasMany(Ficha::class,'ficha_id');
    }

    public function fichas(){
        return $this->hasMany(Ficha::class,'ficha_id');
    }

}
