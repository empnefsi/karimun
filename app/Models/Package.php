<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $primaryKey = 'package_id';

    public function images()
    {
        return $this->hasMany(Image::class, 'foreign_id', 'package_id');
    }
}
