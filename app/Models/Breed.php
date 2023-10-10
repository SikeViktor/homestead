<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'breed_name',        
    ];

    public function animals()
    {
        return $this->hasMany(Animal::class, 'breed_id');
    }
}
