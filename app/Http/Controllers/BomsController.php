<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Item;
use App\Bomhead;
use App\Bomitem;
use DB;

class BomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $items = Item::latest('created_at')->with('itemclass')->paginate(10);
        return view('boms.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
//         $itemclasslist = Itemclass::lists('name', 'id');
//         $itemtypeList = Itemtype::lists('name', 'id');
//         return view('items.create', array(
//             'itemclasslist' => $itemclasslist,
//             'itemtypeList' => $itemtypeList
//         ));
        return view('boms.create');
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
        $bomhead = Bomhead::findOrNew($id);
        $parentItem = Item::findOrFail($id);
//         return $bomhead;
        $bomids = Bomitem::all('item_id');
//         $bomitems = $parentItem->posts()->where('item_id', $id)->get();
//         $bomitems = Bomitem::where('parent_item_id', '=' $id);
        return view('boms.edit', compact('bomhead', 'parentItem'));
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
