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
    ];

    protected $appends = [
        'avatar'
    ];

    public function getAvatarAttribute()
    {
        return "https://www.gravatar.com/avatar/" . md5(strtolower(trim($this->email))) . "?d=mp&s=" . '24';
    }

    /**
     * Get the property associated with the site.
     * 
     * Syntax: return $this->hasMany(Property::class, 'foreign_key', 'local_key');
     *
     * Example: return $this->hasMany(Property::class, 'user_id', 'id');        
     */
    public function property()
    {
        return $this->hasMany(Property::class);
    }
}
