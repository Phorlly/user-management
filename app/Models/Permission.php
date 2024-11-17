<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $table = 'permissions';
    protected $fillable = ['name', 'permission', 'description'];

    public function roles()
    {
        // return $this->belongsToMany(Role::class, 'permission_roles');
        return $this->belongsToMany(Role::class, 'permission_roles', 'permission_id', 'role_id');
    }

    public function routes()
    {
        return $this->hasMany(PermissionRoute::class);
    }
}
