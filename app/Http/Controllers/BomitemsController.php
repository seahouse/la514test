<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

//use App\Http\Requests;
use Request;
use App\Http\Controllers\Controller;
use App\Bomitem;
use App\Http\Requests\BomitemRequest;

class BomitemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        return view('boms.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(BomitemRequest $request)
    {
        //
        $input = Request::all();
        $parentid = $request->input('parent_item_id');
        Bomitem::create($input);
        return redirect('boms/'.$parentid.'/edit');
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
        $bomitem = Bomitem::findOrFail($id);
        return view('Bomitems.edit', compact('bomitem'));
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
        $parentid = Bomitem::find($id)->parent_item_id;
        Bomitem::destroy($id);
        return redirect('boms/'.$parentid.'/edit');
    }
    
    public function createitem($parentid)
    {
//         return $parentid;
        return view('bomitems.createitem', compact('parentid'));
    }
}
