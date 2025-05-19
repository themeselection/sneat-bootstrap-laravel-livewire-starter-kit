<?php

namespace App\Imports;

use App\Models\vehicleMake;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class vehicleMakeImport implements ToModel,  WithHeadingRow

{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new vehicleMake([
            //
             'niipvmid' => $row['vmake_id'],   // Maps 'vmake_id' in Excel to 'niipvmid' in DB
            'vmake' => $row['vmake'], // Maps 'vmake' in Excel to 'vmake' in DB
        ]);
    }
}
