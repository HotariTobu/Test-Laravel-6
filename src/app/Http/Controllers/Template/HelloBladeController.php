<?php

namespace App\Http\Controllers\Template;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class HelloBladeController extends Controller
{
    public function echo()
    {
        $data = [
            'msg' => 'This is a Blade sample',
        ];
        
        return view('hello.echo', $data);
    }

    public function get()
    {
        return view('hello.form');
    }

    public function post(Request $request)
    {
        $msg = $request->msg;

        $data = [
            'msg' => $msg,
        ];
        
        return view('hello.echo', $data);
    }
}
