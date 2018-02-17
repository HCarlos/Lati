<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class Permission extends Model
{
    use HasRoles;

    public function roles() {
        return $this->belongsToMany(Role::class);
    }

    public function users() {
        return $this->hasMany(User::class);
    }
}
