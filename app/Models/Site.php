<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'url',
        'tags',
        'description',
        'active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * Get the image associated with the site.
     * 
     * Syntax: return $this->hasMany(Image::class, 'foreign_key', 'local_key');
     *
     * Example: return $this->hasMany(Image::class, 'user_id', 'id');        
     */
    public function image()
    {
        return $this->hasMany(Image::class);
    }
}
