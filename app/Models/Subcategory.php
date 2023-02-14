<?php

namespace App\Models;
use App\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    
    protected $table = 'tbl_subcategory';
    protected $primaryKey = 'subcategory_id';
   
    protected $fillable = ['subcategory_id','subcategory_name'];
    public function products()
    {
        return $this->hashMay(Product::class, 'subcategory_id', 'subcategory_id');
    }
  
}


