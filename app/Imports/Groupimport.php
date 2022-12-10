<?php

namespace App\Imports;

use App\Models\client_group_master;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithheadingRow;

class Groupimport implements ToModel,WithheadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new client_group_master([
             'client_group' => $row['client_group'],
            'contect_person' => $row['contect_person'],
            'contect_phone' => $row['contect_phone'],
            'designation' => $row['designation'],
            'email' => $row['email'],
            'created' => $row['created'],
        ]);
    }
}
