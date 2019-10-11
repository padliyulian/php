<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Employee([
            'nik'     => $row[0],
            'name'     => $row[1],
            'sex'     => $row[2],
            'position_id'    => $row[3],
            'email'     => $row[4],
            'photo'     => $row[5],
        ]);
    }
}
