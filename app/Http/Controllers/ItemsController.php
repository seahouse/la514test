<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
//use Request;
use App\Http\Requests\ItemRequest;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Itemclass;
use App\Itemtype;
use App\Inventory\Warehouse;
use App\Inventory\Itemsite;

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
        $items = Item::latest('created_at')->with('itemclass')->with('itemtype')->paginate(10);
//         $itemclass = Item::find($id)->itemclass;
//         $items = Item::paginate(5);
        return view('items.index', compact('items'));
    }
    
    /**
     * 
     */
    public function mindex()
    {
        $items = Item::latest('created_at')->paginate(10);
        return $items;
    }
    
    public function search(Request $request)
    {
        $key = $request->input('key');
        if ($key == '')
            return redirect('items');
        
        $items = Item::latest('created_at')->where('item_number', 'like', '%' . $key . '%')->orWhere('item_name', 'like', '%' . $key . '%')->paginate(10);
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
//         $itemclasslist = Itemclass::lists('name', 'id');
//         $itemtypeList = Itemtype::lists('name', 'id');
//         return view('items.create', array(
//             'itemclasslist' => $itemclasslist,
//             'itemtypeList' => $itemtypeList
//         ));
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ItemRequest $request)
    {
        //
        $input = $request->all();
        $item = Item::create($input);

        $warehouse = Warehouse::first();
        if ($warehouse != null)
        {
            $data = [
                'item_id' => $item->id,
                'warehouse_id' => $warehouse->id,
                'qtyonhand' => 0.0,
            ];
            Itemsite::create($data);
        }

        
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
//         $item = Item::findOrFail($id);
//         $itemclass = Item::find($id)->itemclass;
//         $itemtype = Item::find($id)->itemtype;
//         return view('items.show', compact('item', 'itemclass', 'itemtype'));

        return $this->edit($id);
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
//         $itemclasslist = Itemclass::lists('name', 'id');
//         $itemtypeList = Itemtype::lists('name', 'id');
//         return view('items.edit', compact('item', 'itemclasslist', 'itemtypeList'));
        return view('items.edit', compact('item'));
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
        
        $warehouse = Warehouse::first();
        $itemsite = $item->itemsite;
        if ($warehouse != null && $itemsite == null)
        {
            $data = [
                'item_id' => $item->id,
                'warehouse_id' => $warehouse->id,
                'qtyonhand' => 0.0,
            ];
            Itemsite::create($data);
        }
        
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
        // 通过删除itemsite，同时删除了item
        $item = Item::findOrFail($id);
        $itemsite = $item->itemsite;
        if ($itemsite != null)
            Itemsite::destroy($itemsite->id);
        
        Item::destroy($id);
        return redirect('items');
    }
}
