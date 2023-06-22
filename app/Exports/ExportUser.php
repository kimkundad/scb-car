<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportUser implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::select('users.phone','users.birthday', 'users.provider_id', 'users.name', 'provinces.PROVINCE_NAME', 'users.status', 'users.zipcode')->leftjoin('provinces', 'provinces.id',  'users.address')->whereNotIn('users.id', [1,2])->get();
    }
}
