<?php

namespace App\Http\Controllers;

use App\Accountingorder1;
//use Illuminate\Http\Request;
use Request;
use App\Http\Requests\Accountingorder1Request;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Accountingorder1sController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $accountingorder1s = Accountingorder1::latest('created_at')->paginate(10);
        return view('accountingorder1s.index', compact('accountingorder1s'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return view('accountingorder1s.create');
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
        $input = Request::all();
        Accountingorder1::create($input);
        return redirect('accountingorder1s');
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
        $accountingorder1 = Accountingorder1::findOrFail($id);
        return view('accountingorder1s.show', compact('accountingorder1'));
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
        $accountingorder1 = Accountingorder1::findOrFail($id);
        return view('accountingorder1s.edit', compact('accountingorder1'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Accountingorder1Request $request, $id)
    {
        //
        $accountingorder1 = Accountingorder1::findOrFail($id);
        $accountingorder1->update($request->all());
        return redirect('accountingorder1s');
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
        Accountingorder1::destroy($id);
        return redirect('accountingorder1s');
    }
}
