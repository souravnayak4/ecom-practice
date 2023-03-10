<?php
namespace App\Models;
use App\Models\Category;
use App\Models\Subcategory;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
class Product extends Model

{

    use HasFactory;
    protected $table = 'products';
    protected $fillable = [

        'product_name','detail','price', 'image','subcategory_id','category_id','status'];

        public function category()
        {
            return $this->belongsTo('App\Models\Category');
        }
        public function subcategory()
        {
            return $this->belongsTo('App\Models\Subcategory', 'subcategory_id');
        }   






     
}