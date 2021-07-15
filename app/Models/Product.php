<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'minutes',
        'image',
        'price',
        'avaliable'
    ];
    public function users(){
        return $this->belongsToMany('App\Models\Users');
    }

}

