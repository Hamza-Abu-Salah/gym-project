<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Crid;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function comment()
    {
        $crid = Crid::get();

        return view('site.blog-single',compact('crid'));
    }

    public function comment_date(Request $request)
    {
        Comment::create([
            'comment'=>$request->comment,
            'crid_id'=>$request->crid_id,
            'user_id'=>Auth::id(),
        ]);

        return back();
    }

}
