<?php

namespace App\Exports;

use App\Models\manage_complience_information;
use Maatwebsite\Excel\Concerns\FromCollection;

class overdue4report implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return manage_complience_information::where('status','Applicable')->get();
    }
}
