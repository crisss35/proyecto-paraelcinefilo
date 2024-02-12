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

    //* Estos son los datos que esperamos del usuario, los que se van a insertar en la BD
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
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


    public function posts() {

        //* Aplicando la relacion One to Many (Un usuario puede tener varios posts)
        return $this->hasMany(Post::class);

    }

    public function likes() {
        return $this->hasMany(Like::class);
    }

    //*Almacena los seguidores de un usuario
    public function followers() {
        //* Relacion muchos a muchos
        return $this->belongsToMany(User::class, "followers", "user_id", "follower_id");

    }

    //*Almacena los que seguimos
    public function followings() {
        //* Relacion muchos a muchos
        return $this->belongsToMany(User::class, "followers", "follower_id", "user_id");

    }

    public function siguiendo(User $user) {

        return $this->followers->contains( $user->id );

    }


    
}
