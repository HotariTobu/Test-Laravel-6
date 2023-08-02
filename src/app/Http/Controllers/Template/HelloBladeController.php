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

    public function each()
    {
        $data = [
            ['name' => '山田太郎', 'mail' => 'taro@yamada'],
            ['name' => '田中花子', 'mail' => 'hanako@flower'],
            ['name' => '鈴木さちこ', 'mail' => 'sachico@happy'],
        ];

        return view('template.each', ['data' => $data]);
    }

    public function trapped()
    {
        return view('template.trapped', ['controllerMessage' => 'controller message!']);
    }
}
