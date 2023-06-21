<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class CheckController extends Controller
{
    //
    public function checkin(Request $request){

        $code = $request['code'];

        $objs = DB::table('users')->select(
            'users.*',
            'users.id as id_q',
            'users.name as names',
            'users.status as status1',
            'provinces.*',
            )
            ->leftjoin('provinces', 'provinces.id',  'users.address')
            ->where('users.phone', $code)
            ->first();

            $data['objs'] = $objs;

        if($objs){
            return view('checkin', $data);
        }else{
            return view('checkin_404', $data);
        }

        
    }
}
