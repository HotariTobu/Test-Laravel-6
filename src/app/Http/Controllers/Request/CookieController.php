<?php

namespace App\Http\Controllers\Request;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CookieController extends Controller
{
    public function get(Request $request)
    {
        if ($request->hasCookie('msg'))
        {
            $msg = "Cookie: {$request->cookie('msg')}";
        }
        else
        {
            $msg = '※クッキーはありません。';
        }

        return view('middleware.cookie', ['msg' => $msg]);
    }

    public function post(Request $request)
    {
        $this->validate($request, [
            'msg' => 'required',
        ]);

        $msg = "「{$request->msg}」をクッキーに保存しました。";

        $response = response()->view('middleware.cookie', ['msg' => $msg]);

        $response->cookie('msg', $request->msg, 100);

        return $response;
    }
}
