<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainers = Trainer::with('courses')->paginate(10);
        return view('admin.trainers.index',compact('trainers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trainers = Trainer::select('id','name','specialization','content')->get();
        return view('admin.trainers.create',compact('trainers'));
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
            'name'=>'required',
            'image'=>'required',
            'specialization'=>'required',
            'content'=>'required',
        ]);

        $img_name = rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads/trainers'),$img_name);

        Trainer::create([
            'name'=>$request->name,
            'image'=>$img_name,
            'specialization'=>$request->specialization,
            'content'=>$request->content,
            'facebook'=>$request->facebook,
            'twitter'=>$request->twitter,
            'instagram'=>$request->instagram,
            'linkedin'=>$request->linkedin,
        ]);

        return redirect()->route('admin.trainers.index')->with('msg', 'Traniner added successfully')->with('type', 'success');

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
        $trainer = Trainer::findOrFail($id);
        $trainers = Trainer::select('id','name')->get();
        return view('admin.trainers.edit',compact('trainer','trainers'));
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
            'name'=>'required',
            'specialization'=>'required',
            'content'=>'required',
        ]);


        $trainer = Trainer::findOrFail($id);
        $trainers = Trainer::select('id','name','specialization','content')->get();

        $img_name = $trainer->image;
        if($request->hasFile('image')){
            $img_name = rand().time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/trainers'),$img_name);
        }


        $trainer->update([
            'name'=>$request->name,
            'image'=>$img_name,
            'specialization'=>$request->specialization,
            'content'=>$request->content,
            'facebook'=>$request->facebook,
            'twitter'=>$request->twitter,
            'instagram'=>$request->instagram,
            'linkedin'=>$request->linkedin,
        ]);

        return redirect()->route('admin.trainers.index')->with('msg','Trainer updated successfully')->with('type','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trainer = Trainer::findOrFail($id);
        File::delete(public_path('uploads/trainers/'.$trainer->image));
        $trainer->delete();
        return redirect()->route('admin.trainers.index')->with('msg','Trainer deleted successfully')->with('type','danger');
    }
}
