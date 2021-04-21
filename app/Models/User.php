<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return HasMany
     */
    public function domain()
    {
        return $this->HasMany(Domain::class);
    }


    /**
     * @return mixed
     */
    public function isRole()
    {
        return $this->role;
    }

    /**
     * @return bool
     * function verify if the user is admin
     */
    public function isAdmin() : bool
    {
        return $this->attributes['role'] === 'admin';
    }

    /**
     * @return bool
     * function verify if the user is accountant
     */
    public function isAccountant() : bool
    {
        return $this->attributes['role'] === 'accountant';
    }

    /**
     * @return bool
     * function verify if the user is user
     */
    public function isUser() : bool
    {
        return $this->attributes['role'] === 'user';
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeAdmin($query)
    {
        return $query->where('role','admin');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeAccountant($query)
    {
        return $query->where('role','accountant');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeUser($query)
    {
        return $query->where('role','user');
    }
}
