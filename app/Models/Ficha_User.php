<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ficha_User extends Model
{
    protected $guard_name = 'web';

    protected $table = 'ficha_user';

    protected $fillable = [
        'ficha_id','user_id','action','fecha','observaciones',
    ];

    protected $hidden = [
        'idemp','status_ficha_user','ip','host','created_at', 'updated_at'
    ];

}
