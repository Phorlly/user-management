<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionRoute extends Model
{
    use HasFactory;

    protected $table = 'permission_routes';
    protected $fillable = ['route', 'name', 'permission_id'];
    public $timestamps = false; // Disable timestamps


    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }
}
