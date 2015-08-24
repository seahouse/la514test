<?php

namespace App\Http\Controllers\System;

// use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\System\Image;
use App\Http\Requests\System\ImageRequest;
use Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $images = Image::latest('created_at')->paginate(10);
        return view('system.images.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return view('system.images.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ImageRequest $request)
    {
        //
        if (Request::hasFile('image'))
        {
            $file = Request::file('image');
            $file->move('uploads', $file->getClientOriginalName());
        }
        return 'cccc';
        
        $input = Request::all();
        Image::create($input);
        return redirect('system/images');
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
        $image = Image::findOrFail($id);
        return view('system.images.edit', compact('image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(ImageRequest $request, $id)
    {
        //
        return 'aaaa';
        if (Request::hasFile('image'))
        {
            return 'bbb';
            $file = Request::file('path');
            $file->move('uploads', $file->getClientOriginalName());
        }
        
//         $path = $request->get('path');
//         $pathDest = '';
//         if ($path <> '')
//         {
//             $sExtension = substr($path, strrpos($path, '.') + 1);
//             $sFilename = date('YmdHis').rand(100, 200) . '.' . $sExtension;
//             $pathDest = 'images/' . $sFilename;
//             Storage::put($pathDest, file_get_contents(iconv('utf-8', 'gbk', $path)));            
//         }
        
        $image = Image::findOrFail($id);
        
//         if ($path == '')
//         {
//             $pathDest = $image->path;
//         }
        
        $image->update($request->all());
//         $image->path = $pathDest;
        $image->save();
        return redirect('system/images');
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
        Image::destroy($id);
        return redirect('system/images');
    }
}
