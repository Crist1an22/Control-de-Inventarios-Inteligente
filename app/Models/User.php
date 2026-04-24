<?php

namespace App\Models;

<<<<<<< HEAD
=======
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
>>>>>>> 6de8615b9b9aac4f5bcf61efc0360250e0bd8c65
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
<<<<<<< HEAD
    use HasFactory, Notifiable;

=======
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
>>>>>>> 6de8615b9b9aac4f5bcf61efc0360250e0bd8c65
    protected $fillable = [
        'name',
        'email',
        'password',
<<<<<<< HEAD
        'role',
    ];

=======
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
>>>>>>> 6de8615b9b9aac4f5bcf61efc0360250e0bd8c65
    protected $hidden = [
        'password',
        'remember_token',
    ];

<<<<<<< HEAD
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function movimientos()
    {
        return $this->hasMany(Movimiento::class, 'responsable_id');
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isAlmacenista()
    {
        return $this->role === 'almacenista';
    }
}
=======
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
>>>>>>> 6de8615b9b9aac4f5bcf61efc0360250e0bd8c65
