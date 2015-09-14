<?php

namespace App\Http\Controllers\Sales;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Sales\Receivable;
use App\Sales\Salesorder;

class ReceivablesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($soheadId)
    {
        //
        $receivables = Receivable::where('sohead_id', $soheadId)->paginate(10);
        return view('sales.receivables.index', compact('receivables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($soheadId)
    {
        //
        $salesorder = Salesorder::findOrFail($soheadId);
//         $permissionIds = RolePermission::where('role_id', $roleId)->select('permission_id')->get();
//         $permissionList = Permission::whereNotIn('id', $permissionIds)->select('id', DB::raw('concat(name, \' - \', display_name) as name'))->lists('name', 'id');
//         if ($role != null)
//             return view('system.rolepermissions.create', compact('role', 'permissionList'));
//         else
//             return '无此角色';
        return view('sales.receivables.create', compact('salesorder'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
