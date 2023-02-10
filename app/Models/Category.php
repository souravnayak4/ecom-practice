<?php

namespace App\Models;
use App\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['id','name'];
    public function products()
    {
        return $this->hashMay(Product::class, 'category_id', 'id');
    }

   
 
}
