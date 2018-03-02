<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasPermissions;
use Illuminate\Foundation\Auth\User;

class Role extends Model
{
    use HasPermissions;

    protected $fillable = ['name',];

    public function permissions() {
        return $this->belongsTo(Permission::class);
    }

    public function users() {
        return $this->belongsToMany(User::class);
    }

}
