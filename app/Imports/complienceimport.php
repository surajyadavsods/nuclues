<?php

namespace App\Imports;
use Auth;
use App\Models\country_compliance__master;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithheadingRow;
class complienceimport implements ToModel,WithheadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new country_compliance__master([
            
            'country' => $row['country'],
            'entity_type' => $row['entity_type'],
            'forms' => $row['forms'],
            'periodend' => $row['periodend'],
            'complaince_name' => $row['complaince_name'],
            'notes' => $row['notes'],
            'created' => Auth::id(),
        ]);
    }
}
