<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $primaryKey = 'news_id';

    protected $fillable = [
        'title',
        'slug',
        'description',
    ];
    
    public function images()
    {
        return $this->hasMany(Image::class, 'foreign_id', 'news_id');
    }
}
