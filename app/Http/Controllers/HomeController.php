<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function api_post_status_user(Request $request){

           $id = $request->user_id;

           $objs = User::find($id);
           $objs->status = 1;
           $objs->save();

           return response()->json([
            'data' => [
              'success' => 'success',
            ]
          ]);

    }

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
