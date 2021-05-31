<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $primaryKey = 'destination_id';
    protected $fillable = ['name', 'slug', 'description', 'coordinate'];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable', 'role', 'foreign_id');
    }
}
