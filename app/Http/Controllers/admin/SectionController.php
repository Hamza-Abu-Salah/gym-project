<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::paginate(10);
        return view('admin.sections.index',compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections = Section::select('id','title','content')->get();

        return view('admin.sections.create',compact('sections'));
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
            'title'=>'required',
            'content'=>'required',
            'image'=>'required',
            'discount'=>'required',
            'btn_text'=>'required',
            'btn_link'=>'nullable',
        ]);

        $img_name = rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads/sections'),$img_name);

        Section::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'image'=>$img_name,
            'discount'=>$request->discount,
            'btn_text'=>$request->btn_text,
            'btn_link'=>$request->btn_link,
        ]);

        return redirect()->route('admin.sections.index')->with('msg','Sections added successfully')->with('type','success');
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
        $section = Section::findOrFail($id);
        $sections = Section::select('id','title','content')->get();

        return view('admin.sections.edit',compact('section','sections'));
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
            'title'=>'required',
            'content'=>'required',
            'discount'=>'required',
            'btn_text'=>'required',
            'btn_link'=>'nullable',
        ]);
        $section = Section::findOrFail($id);
        $sections = Section::select('id','title','content')->get();

        if($request->hasFile('image')){
            $img_name = rand().time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/sections'),$img_name);
        }
        $section->update([
            'title'=>$request->title,
            'content'=>$request->content,
            'discount'=>$request->discount,
            'btn_text'=>$request->btn_text,
            'btn_link'=>$request->btn_link,
        ]);
        return redirect()->route('admin.sections.index')->with('msg','Section Updated successfully')->with('type','success');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $section = Section::findOrFail($id);
        File::delete(public_path('uploads/sections/'.$section->image));
        $section->delete();
        return redirect()->route('admin.sections.index')->with('msg','deleted sections successfully')->with('type','danger');

    }
}
