<?php

namespace App\Imports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;

class CategoryImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Category([
            "cat_cover" => $row['1'],
            "cat_name" => $row['2'],
            "cat_details" => $row['3'],
            "short_code" => $row['4'],
        ]);
    }
}
