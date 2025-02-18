<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function post_data(Request $request){
        $data = new Post();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->department = $request->department;
        $data->stID = $request->stID;
        $data->save();
        return redirect()->back();
    }
}
