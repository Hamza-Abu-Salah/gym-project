<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Email;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function email()
    {
        $messages = Message::all();

        return view('admin.message.index',compact('messages'));
    }
}
