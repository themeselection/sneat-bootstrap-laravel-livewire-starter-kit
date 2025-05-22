<?php

namespace App\Imports;

use App\Models\vehicleModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class vehicleModelImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new vehicleModel([
            
            'vmodelid'=>$row['id'],
            'niipvmid'=>$row['vmid'],
            'vmodelname'=>$row['name'],
            'vmodelfullname'=>$row['fullname']
        ]);
    }
}
