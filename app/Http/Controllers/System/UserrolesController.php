<?php

namespace App\Http\Controllers\System;

// use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\System\Userrole;
use App\User;
use App\Role;
use DB;
use App\Http\Requests\System\UserroleRequest;
use Request;

class UserrolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($userId)
    {
        //
        $userroles = Userrole::where('user_id', $userId)->paginate(10);
        return view('system.userroles.index', compact('userroles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($userId)
    {
        //
        $user = User::findOrFail($userId);
        $roleIds = Userrole::where('user_id', $userId)->select('role_id')->get();
        $roleList = Role::whereNotIn('id', $roleIds)->select('id', DB::raw('concat(name, \' - \', display_name) as name'))->lists('name', 'id');
        if ($user != null)
            return view('system.userroles.create', compact('user', 'roleList'));
        else
            return '无此用户';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(UserroleRequest $request)
    {

//         $input = Request::all();
//         Userrole::create($input);
//         return redirect('system/depts');
        
//         $data = [
//             'user_id' => $request->input('user_id'),
//             'role_id' => $request->input('role_id'),
//         ];
        

//         $userrole = new Userrole;
//         $userrole->user_id = $request->user_id;
//         $userrole->role_id = $request->role_id;
//         $userrole->save();

        $user = User::findOrFail($request->input('user_id'));
        $role = Role::findOrFail($request->input('role_id'));
        if ($user != null && $role != null)
            $user->attachRole($role);
        
        return redirect('system/users/' . $request->input('user_id') . '/roles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
        return view('system.userroles.edit', compact('user', 'roleList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($userId, $roleId)
    {
        //
        $user = User::findOrFail($userId);
        $role = Role::findOrFail($roleId);
        if ($user != null && $role != null)
            $user->detachRole($role);
        else 
            back();
        
        return redirect('system/users/' . $userId . '/roles');
    }
}
