<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peticione extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'descripcion', 'destinatario', 'firmantes', 'estado', 'user_id', 'categoria_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function firmas()
    {
        return $this->belongsToMany(User::class, 'peticione_user');
    }

    public function haFirmado(User $user)
    {
        return $this->firmas()->where('user_id', $user->id)->exists();
    }

    public function scopePorEstado($query, $estado)
    {
        return $query->where('estado', $estado);
    }

    public function scopePorUsuario($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    public function getImagenUrlAttribute()
    {
        return $this->imagen ? asset('storage/' . $this->imagen) : null;
    }
}


