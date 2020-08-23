<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToCollection,WithHeadingRow
{
    public function collection(Collection $rows)
    {
        $data = [];
        foreach ($rows as $row) 
        {
            $data[] = [
                'role_id'     => $row['role'],
                'name'        => $row['name'],
                'email'       => $row['email'],
                'mobile_no'   => $row['phone'],
                'district_id' => $row['district'],
                'upazila_id'  => $row['upazila'],
                'postal_code' => $row['postal_code'],
                'address'     => $row['address'],
                'status'      => $row['status'],
                'password'      => $row['password'],
            ];
        }

        User::insert($data);
    }
}
