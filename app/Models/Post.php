<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //* Estos son los datos que laravel debe reconocer antes de insertar en la BD
    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'user_id'
    ];

    public function user() {

        //* Un post esta asociado a un solo usuario
        return $this->belongsTo(User::class)->select(['name', 'username']); //? Solo traera el nombre y username

    }

    public function comentarios() {

        //* Un post tendra multiples comentarios
        return $this->hasMany(Comentario::class);

    }

    public function likes() {

        //* Un post puede tener muchos likes
        return $this->hasMany(Like::class);

    }

    public function checkLike(User $user) {

        //* Revisar si la tabla de likes contiene el id del usuario que ya dio like, esto evitara la repeticion de registros en la tabla
        return $this->likes->contains("user_id", $user->id);

    }
}
