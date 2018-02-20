<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Editorial extends Model
{
    use Notifiable;

    protected $guard_name = 'web'; // or whatever guard you want to use

    protected $table = 'editoriales';
    protected $fillable = ['editorial','no',];

}
