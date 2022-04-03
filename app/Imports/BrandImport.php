<?php

namespace App\Imports;

use App\Models\Brand;
use Maatwebsite\Excel\Concerns\ToModel;

class BrandImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Brand([
            "brand_name" => $row['1'],
            "brand_code" => $row['2'],
            "brand_details" => $row['3'],
            "category_brand" => $row['4'],
            "brand_size" => $row['5'],
            "brand_price" => $row['6'],
        ]);
    }
}
