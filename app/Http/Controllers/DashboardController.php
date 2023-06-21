<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\ExportUser;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportUser;

class DashboardController extends Controller
{
    //

    public function index(){

      
        $data = 1;
        return view('admin.dashboard.index', compact('data'));
    }

    public function orders_export() 
    {
        return Excel::download(new ExportUser, 'users.xlsx');
    }

    public function orders_import(Request $request){
        Excel::import(new ImportUser,
        $request->file('file')->store('files'));
        return redirect()->back();
    }


}
