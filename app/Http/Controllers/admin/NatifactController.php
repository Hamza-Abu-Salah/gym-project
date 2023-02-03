<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Natifact;
use App\Models\User;
use App\Notifications\UserFollowNotification;
use Illuminate\Http\Request;

class NatifactController extends Controller
{
    public function Natifact()
    {
       $natifactions = Natifact::all();
       return view('admin.Natifaction.index',compact('natifactions'));
    }
}
