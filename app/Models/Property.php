<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'city',
        'country',
        'zipcode',
        'tenant',
        'user_id',
    ];

    /**
     * Get the site associated with the image.
     * 
     * Syntax: return $this->belongsTo(Site::class, 'foreign_key', 'local_key');
     *
     * Example: return $this->belongsTo(Site::class, 'user_id', 'id');        
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the images associated with the property.
     * 
     * Syntax: return $this->hasMany(Image::class, 'foreign_key', 'local_key');
     *
     * Example: return $this->hasMany(Image::class, 'property_id', 'id');        
     */
    public function image()
    {
        return $this->hasMany(Image::class);
    }
}
