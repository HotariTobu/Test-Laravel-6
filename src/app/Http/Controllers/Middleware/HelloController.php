<?php

namespace App\Http\Controllers\Middleware;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class HelloController extends Controller
{
    public function get()
    {
        return view('middleware.validation', ['msg' => 'フォームを入力: ']);
    }

    public function post(Request $request)
    {
        $validationRules = [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric|between:0,150',
        ];

        $this->validate($request, $validationRules);

        return view('middleware.validation', ['msg' => '正しく入力されました！']);
    }
}
