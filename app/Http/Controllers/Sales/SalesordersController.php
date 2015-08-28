<?php

namespace App\Http\Controllers\Sales;

// use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Sales\Salesorder;
use App\Http\Requests\Sales\SalesorderRequest;
use Request;

class SalesOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $salesorders = Salesorder::latest('created_at')->paginate(10);
        return view('sales.salesorders.index', compact('salesorders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return view('sales.salesorders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(SalesorderRequest $request)
    {
        //
        $input = Request::all();
        Salesorder::create($input);
        return redirect('sales/salesorders');
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
        $salesorder = Salesorder::findOrFail($id);
        return view('sales.salesorders.edit', compact('salesorder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(SalesorderRequest $request, $id)
    {
        //
        $salesorder = Salesorder::findOrFail($id);
        $salesorder->update($request->all());
        return redirect('sales/salesorders');
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
        Salesorder::destroy($id);
        return redirect('sales/salesorders');
    }
}
