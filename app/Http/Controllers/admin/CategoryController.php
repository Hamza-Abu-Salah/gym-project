<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use PhpParser\Node\Stmt\Catch_;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('parent','courses')->paginate(10);
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select('id','name')->get();
        $category = new Category();
        return view('admin.categories.create',compact('categories','category'));
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
            'parent_id'=>'nullable|exists:categories,id',
        ]);

            $img_name = rand().time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/categories'),$img_name);



        Category::create([
            'name'=>$request->name,
            'parent_id'=>$request->parent_id,
            'image'=>$img_name,
        ]);

        return redirect()->route('admin.categories.index')->with('msg','adeed Categories successfully')->with('type','success');
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
        $category = Category::findOrFail($id);
        $categories = Category::select('id','name')->get();

        return view('admin.categories.edit',compact('category','categories'));


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
            'parent_id'=>'nullable|exists:categories,id',
        ]);
        $category = Category::findOrfail($id);
        $img_name =$category->image;

        if($request->hasFile('image')){
            $img_name = rand().time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/categories'),$img_name);
        }


        $category->update([
            'name'=>$request->name,
            'parent_id'=>$request->parent_id,
            'image'=>$img_name,
        ]);

        return redirect()->route('admin.categories.index')->with('msg','updated Categories successfully')->with('type','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        File::delete(public_path('uploads/categories/'.$category->image));

        $category->delete();

        return redirect()->route('admin.categories.index')->with('msg','deleted Categories successfully')->with('type','danger');

    }
}
