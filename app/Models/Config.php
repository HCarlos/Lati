<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $guard_name = 'web';
    protected $table = 'config';
    protected $fillable = ['key','value',];
    protected $hidden = ['created_at', 'updated_at',];

    public static function findOrCreate(string $Key, string $Value){
        $config = static::all()->where('key', $Key)->first();
        if (!$config) {
            return static::create([
                'key' => $Key,
                'value' => $Value,
            ]);
        }
        return $config;
    }

}
