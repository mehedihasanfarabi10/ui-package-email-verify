<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id','subcategory_id','user_id','title','slug','image','description','tags'
    ];

    // Join with category 
    public function category(){
        // category_id (foreign key)
        return $this->belongsTo(Category::class,'category_id');
    }

    // Join with subcategory 
    public function subcategory(){
        // category_id (foreign key)
        return $this->belongsTo(Subcategory::class,'category_id');
    }
    // Join with user 
    public function user(){
        // category_id (foreign key)
        return $this->belongsTo(User::class,'category_id');
    }




}
