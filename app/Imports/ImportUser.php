<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\DB;

class ImportUser implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $objs = DB::table('provinces')
            ->where('PROVINCE_NAME', $row[4])
            ->first();

         //   dd($objs->id);

        return new User([
            'password' => bcrypt('12345678'),
            'name' => $row[3],
            'email' => rand(1000,9999).'@gmail.com',
            'phone' => $row[0],
            'provider_id' => $row[2],
            'birthday' => $row[1],
            'address' => $objs->id,
            'provider' => 'email',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'is_admin' => 0,
        ]);
    }
}

