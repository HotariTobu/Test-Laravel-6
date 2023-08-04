<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function get(Request $request)
    {
        $sessionData = $request->session()->get('input');
        return view('session.index', ['sessionData' => $sessionData]);
    }

    public function post(Request $request)
    {
        $input = $request->input;
        $request->session()->put('input', $input);
        return redirect('session');
    }
}
