<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

//    use HasPermissions;

    protected $guard_name = 'web'; // or whatever guard you want to use
    protected $table = 'users';
 
    protected $fillable = ['username', 'email', 'password','admin','filename','root'];
    protected $hidden = ['password', 'remember_token',];
    protected $casts = ['admin'=>'boolean'];

    public function permissions() {
//        return $this->hasAnyPermission(Permission::class);
        return $this->belongsToMany(Permission::class);
    }

    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function isAdmin(){
        return $this->admin;
    }

    public function IsEmptyPhoto(){
        return $this->filename == '' ? true : false;
    }


}
