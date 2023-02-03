<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallerys = Gallery::paginate(10);

        return view('admin.gallerys.index',compact('gallerys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gallerys = Gallery::select('id')->get();

        return view('admin.gallerys.create',compact('gallerys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'path'=>'required',
        ]);

        $path_name = rand().time().$request->file('path')->getClientOriginalName();
        $request->file('path')->move(public_path('uploads/gallerys'),$path_name);

        Gallery::create([
            'path'=>$path_name,
        ]);

        return redirect()->route('admin.gallerys.index')->with('msg','Gallery added successfully')->with('type','success');
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
        $gallery = Gallery::findOrFail($id);
        $gallerys = Gallery::select('id')->get();

        return view('admin.gallerys.edit',compact('gallery','gallerys'));
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
        $request->validate([
            'path'=>'required',
        ]);
        $gallery = Gallery::findOrFail($id);
        $gallerys = Gallery::select('id')->get();

        if($request->hasFile('path')){
            $path_name = rand().time().$request->file('path')->getClientOriginalName();
            $request->file('path')->move(public_path('uploads/gallerys'),$path_name);
        }

        $gallery->update([
            'path'=>$path_name,
        ]);

        return redirect()->route('admin.gallerys.index')->with('msg','Gallery updated successfully')->with('type','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        File::delete(public_path('uploads/gallerys/'.$gallery->path));

        $gallery->delete();

        return redirect()->route('admin.gallerys.index')->with('msg','Gallery deleted successfully')->with('type','danger');

    }
}
