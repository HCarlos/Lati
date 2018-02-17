<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasPermissions;

class Role extends Model
{
    use HasPermissions;

    public function permissions() {
        return $this->belongsTo(Permission::class);
    }
    protected $fillable = ['name',];

    public function users() {
        return $this->belongsToMany(User::class);
    }

}
