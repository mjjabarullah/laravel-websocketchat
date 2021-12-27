<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function index(){
        $messages = Message::paginate(10)->get();
    }
}
