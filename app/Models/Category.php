<?php

namespace App\Models;
use App\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public function products()
    {
        return $this->hashMay(Product::class);
    }
}
