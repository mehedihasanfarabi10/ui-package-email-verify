<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'category_slug'
    ];

    //Mutators use when push a info into database then rule can set uppercase lowercase

    public function setCategoryNameAttribute($value){
        $this->attributes['category_name'] = ucfirst($value);
    }



}
