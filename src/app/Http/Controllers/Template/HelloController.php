<?php

namespace App\Http\Controllers\Template;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class HelloController extends Controller
{
    public function __invoke()
    {
        return view('hello.index');
    }

    public function param()
    {
        $data = [
            'msg' => 'This is a message passed from the controller to the template',
        ];
        
        return view('hello.param', $data);
    }

    public function query(Request $request)
    {
        $data = [
            'id' => $request->id,
            'pass' => $request->pass,
        ];
        
        return view('hello.user', $data);
    }
}
