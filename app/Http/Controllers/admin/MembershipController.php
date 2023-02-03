<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $memberships = Membership::paginate(10);

        return view('admin.membership.index',compact('memberships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $memberships = Membership::select('id')->get();
        return view('admin.membership.create',compact('memberships'));
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
            'price'=>'required',
            'per'=>'required',
            'content'=>'required',
        ]);

        $img_name = rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads/memberships'),$img_name);

        $memberships = Membership::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'per'=>$request->per,
            'image'=>$img_name,
            'content'=>$request->content,
            'fruits'=>implode(',',$request->fruits) ,

        ]);

        $memberships->fruits = $request->fruits;



        return redirect()->route('admin.memberships.index')->with('msg','Added memberships successfully')->with('type','success');
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
        $membership = Membership::findOrFail($id);
        $memberships = Membership::select('id','name')->get();

        return view('admin.membership.edit',compact('membership','memberships'));
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
            'price'=>'required',
            'per'=>'required',
            'content'=>'required',
        ]);

        $membership = Membership::findOrFail($id);
        $memberships = Membership::select('id','name')->get();

        $img_name = $membership->image;
        if($request->hasFile('image')){
            $img_name = rand().time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/memberships'),$img_name);
        }

        $membership->update([
            'name'=>$request->name,
            'price'=>$request->price,
            'per'=>$request->per,
            'image'=>$img_name,
            'content'=>$request->content,
            'fruits'=>implode(',',$request->fruits) ,
        ]);



        return redirect()->route('admin.memberships.index')->with('msg','Updated memberships successfully')->with('type','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $membership = Membership::findOrFail($id);
        File::delete(public_path('uploads/memberships/'.$membership->image));

        $membership->delete();

        return redirect()->route('admin.memberships.index')->with('msg','deleted memberShip successfully')->with('type','danger');
    }
}
