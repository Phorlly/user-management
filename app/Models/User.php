<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function buttonAccessable(string $param)
    {
        if ($this->role_id === 1) {
            return true;
        } else {
            $items = $this->role->permissions;
            foreach ($items as $item) {
                if ($item->routes->contains('name', $param)) {
                    return true;
                }
            }
            return false;
        }
    }

    // public function buttonAcessable(string $param)
    // {
    //     if ($this->role_id === 1) {
    //         return true;
    //     } else {
    //         $items = $this->role->permissions;
    //         foreach ($items as $item) {
    //             foreach ($item->routes as $route) {
    //                 $routeNameParts = explode('.', $route->name);
    //                 $lastPart = end($routeNameParts);

    //                 if ($lastPart === $param) {
    //                     return true;
    //                 }
    //             }
    //         }
    //         return false;
    //     }
    // }
}
