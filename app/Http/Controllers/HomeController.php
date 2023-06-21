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

    
}
