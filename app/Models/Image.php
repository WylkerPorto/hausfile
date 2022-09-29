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
        'src',
        'name',
        'site_id'
    ];

    /**
     * Get the site associated with the image.
     * 
     * Syntax: return $this->belongsTo(Site::class, 'foreign_key', 'local_key');
     *
     * Example: return $this->belongsTo(Site::class, 'user_id', 'id');        
     */
    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}
