<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'id'=>$row[0],
            'product_name'=>$row[1],
            'detail'=>$row[2],
            'price'=>$row[3],
            'image'=>$row[4],
            'category_id'=>$row[5],
            'subcategory_id'=>$row[6],
            'status'=>$row[7],
        ]);
    }
}
