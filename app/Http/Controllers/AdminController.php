<?php

namespace App\Http\Controllers;

use App\User;

use App\Http\Requests;
use App\Http\Requests\createUsersRequests;
use App\Role;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        //
        $user = User::all();
        return  view('admin.users.index', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()


    {
        $role = Role::all();

        return  view('admin.users.create', ['role' => $role]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //CHECK IF  FILE EXISTS

        //   echo   $request->get('is_active');
        //     exit;

        $input = $request->all();

        if ($file = $request->file('image')) {

            //  $filename =  $file->getClientOriginalName();  //get filename

            $filename = time() . '.' . $file->getClientOriginalExtension(); //get filename

            $file->move('images', $filename);

            $input['image'] = $filename;

            $input['password'] = bcrypt($request->password);

             User::create($input);
        }


      return   redirect('/admin/users');
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
       $userid =  User::find($id);

       $role = Role::all();

        return view('admin.users.edit', ['user'=> $userid, 'role' => $role]);
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
        return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
