<?php
namespace App\Models;
use App\Models\Category;
use App\Models\Subcategory;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

  

class Product extends Model

{

    use HasFactory;

  

    protected $fillable = [

        'name', 'detail','price', 'image','subcategory_id','category_id','status'];

        public function category()
        {

        return $this->belongsTo(Category::class);

        }
        public function subcategory()
        {

        return $this->belongsTo(Subcategory::class);

        }
      
        

    

}