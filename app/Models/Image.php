<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'image',
        'property_id',
    ];

    /**
     * Get the property associated with the image.
     * 
     * Syntax: return $this->belongsTo(Property::class, 'foreign_key', 'local_key');
     *
     * Example: return $this->belongsTo(Property::class, 'property_id', 'id');        
     */
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
