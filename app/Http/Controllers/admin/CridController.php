<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Crid;
use App\Models\Trainer;
use Illuminate\Http\Request;

class CridController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $crids = Crid::with('trainer')->paginate(10);
        return view('admin.crids.index',compact('crids'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trainers = Trainer::select('id', 'name')->get();
        $crid = new Crid();
        return view('admin.crids.create',compact('trainers','crid'));
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
            'trainer_id'=>'required',
            'image'=>'required'
        ]);

        $img_name = rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads/crids'),$img_name);

        Crid::create([
            'title'=>$request->title,
            'image'=>$img_name,
            'content'=>$request->content,
            'day'=>$request->day,
            'trainer_id'=>$request->trainer_id
        ]);

        return redirect()->route('admin.crid.index')->with('msg','added crid successfully')->with('type','success');
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
        $crid = Crid::findOrFail($id);
        $trainers = Trainer::select('id', 'name')->get();

        return view('admin.crids.edit',compact('crid','trainers'));
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
            'trainer_id'=>'required',
        ]);

        $crid = Crid::findOrFail($id);
        $img_name = $crid->image;
        if($request->hasFile('image')){
            $img_name = rand().time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/crids'),$img_name);
        }


        $crid->update([
            'title'=>$request->title,
            'image'=>$img_name,
            'content'=>$request->content,
            'day'=>$request->day,
            'trainer_id'=>$request->trainer_id
        ]);

        return redirect()->route('admin.crid.index')->with('msg','updated crid successfully')->with('type','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
