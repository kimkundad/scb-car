<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\role_user;
use Illuminate\Support\Facades\Hash;
use App\Models\province;

class MyUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count = User::whereNotIn('users.id', [1,2])->count();
        $count2 = User::where('status', 1)->whereNotIn('users.id', [1,2])->count();

        if($count2 > 0){
            $percent = (($count2 * 100)/ $count) / 100;
        }else{
            $percent = 0.0;
        }
        
   
        //
        $objs = DB::table('users')->select(
            'users.*',
            'users.id as id_q',
            'users.name as names',
            'users.status as status1',
            'provinces.*',
            )
            ->leftjoin('provinces', 'provinces.id',  'users.address')
            ->whereNotIn('users.id', [1,2])
            ->orderby('users.id', 'desc')
            ->paginate(15);

            $objs->setPath('');

        return view('admin.MyUser.index', compact('objs', 'count', 'count2', 'percent'));
    }


    public function users_search(Request $request){

        $this->validate($request, [
            'search' => 'required'
          ]);
          $search = $request->get('search');

          $count = User::whereNotIn('users.id', [1,2])->count();
        $count2 = User::where('status', 1)->whereNotIn('users.id', [1,2])->count();

        if($count2 > 0){
            $percent = (($count2 * 100)/ $count) / 100;
        }else{
            $percent = 0.0;
        }

          $objs = DB::table('users')->select(
            'users.*',
            'users.id as id_q',
            'users.name as names',
            'users.status as status1',
            'provinces.*',
            )
            ->leftjoin('provinces', 'provinces.id',  'users.address')
            ->whereNotIn('users.id', [1,2])
            ->where('users.name', 'like', "%$search%")
            ->orderby('users.created_at', 'desc')
            ->paginate(15);

            $objs->setPath('');

        return view('admin.MyUser.search', compact(
            'objs',
            'search',
            'count', 'count2', 'percent'
        ));

    }

    public function dealer_search(Request $request){

        $count = User::whereNotIn('users.id', [1,2])->count();
        $count2 = User::where('status', 1)->whereNotIn('users.id', [1,2])->count();

        if($count2 > 0){
            $percent = (($count2 * 100)/ $count) / 100;
        }else{
            $percent = 0.0;
        }

        $this->validate($request, [
            'search' => 'required'
          ]);
          $search = $request->get('search');

          $objs = DB::table('users')->select(
            'users.*',
            'users.id as id_q',
            'users.name as names',
            'users.status as status1',
            'provinces.*',
            )
            ->leftjoin('provinces', 'provinces.id',  'users.address')
            ->whereNotIn('users.id', [1,2])
            ->where('users.provider_id', 'like', "%$search%")
            ->orderby('users.created_at', 'desc')
            ->paginate(15);

            $objs->setPath('');

        return view('admin.MyUser.search2', compact(
            'objs',
            'search',
            'count',
             'count2', 'percent'
        ));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $province = province::all();
        $data['province'] = $province;
        $data['method'] = "post";
        $data['url'] = url('admin/MyUser');
        return view('admin.MyUser.create', $data);
    }

    public function import_view(){
        return view('admin.MyUser.import_view');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'phone' => 'required',
            'name' => ['required', 'string', 'max:255'],
        ]);

        $user = User::create([
            'name' => $request['name'],
            'email' => rand(1000,9999).'@gmail.com',
            'phone' => $request['phone'],
            'provider_id' => $request['provider_id'],
            'birthday' => $request['birthday'],
            'address' => $request['address'],
            'provider' => 'email',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'is_admin' => 0,
            'password' => Hash::make($request['password']),
        ]);

        return redirect(url('admin/MyUser'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $province = province::all();
        $data['province'] = $province;
        $objs = User::find($id);
        $data['url'] = url('admin/MyUser/'.$id);
        $data['method'] = "put";
        $data['objs'] = $objs;
       
        return view('admin.MyUser.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
                $this->validate($request, [
                    'phone' => 'required',
                    'name' => 'required',
                    'provider_id' => 'required'
                ]);

                $objs = User::find($id);
                $objs->name = $request['name'];
                $objs->birthday = $request['birthday'];
                $objs->phone = $request['phone'];
                $objs->provider_id = $request['provider_id'];
                $objs->address = $request['address'];
                $objs->status = $request['status'];
                $objs->save();


              return redirect(url('admin/MyUser/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del_MyUser($id)
    {
        //
        $obj = User::find($id);
        $obj->delete();

        return redirect(url('admin/MyUser/'))->with('del_success','คุณทำการลบอสังหา สำเร็จ');
    }
}
