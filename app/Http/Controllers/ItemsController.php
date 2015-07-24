<?php

namespace App\Http\Controllers;

use App\Item;
//use Illuminate\Http\Request;
use Request;
use App\Http\Requests\ItemRequest;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Itemclass;
use App\Itemtype;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
//         $items = Item::latest('created_at')->get();
        $items = Item::latest('created_at')->paginate(5);
//         $items = Item::paginate(5);
        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        $itemclasslist = Itemclass::lists('name', 'id');
        $itemtypeList = Itemtype::lists('name', 'id');
        return view('items.create', array(
            'itemclasslist' => $itemclasslist,
            'itemtypeList' => $itemtypeList
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ItemRequest $request)
    {
        //
        $input = Request::all();
        Item::create($input);
        return redirect('items');
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
        $item = Item::findOrFail($id);
        $itemclass = Item::find($id)->itemclass;
        $itemtype = Item::find($id)->itemtype;
        return view('items.show', compact('item', 'itemclass', 'itemtype'));
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
        $item = Item::findOrFail($id);
        $itemclasslist = Itemclass::lists('name', 'id');
        $itemtypeList = Itemtype::lists('name', 'id');
        return view('items.edit', compact('item', 'itemclasslist', 'itemtypeList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, ItemRequest $request)
    {
        //
        $item = Item::findOrFail($id);
        $item->update($request->all());
        return redirect('items');
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
