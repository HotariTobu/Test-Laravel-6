<?php

namespace App\Http\Controllers\Request;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;

use App\Http\Requests\HelloRequest;
use App\Rules\MyRule;

class HelloController extends Controller
{
    public function get()
    {
        return view('middleware.validation', ['msg' => 'フォームを入力: ']);
    }

    public function post(HelloRequest $request)
    {
        return view('middleware.validation', ['msg' => '正しく入力されました！']);
    }

    public function validator(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric|between:0,150',
        ]);

        if ($validator->fails()) {
            return redirect('hello')
                ->withErrors($validator)
                ->withInput();
        }

        return view('middleware.validation', ['msg' => '正しく入力されました！']);
    }

    public function query(Request $request)
    {
        $validator = Validator::make($request->query(), [
            'id' => 'required',
            'pass' => 'required',
        ]);

        if ($validator->fails())
        {
            $msg = 'クエリに問題があります。';
        }
        else
        {
            $msg = 'ID/PASSを受け付けました。フォームを入力してください。';
        }

        return view('middleware.validation', ['msg' => $msg]);
    }

    public function message(Request $request)
    {
        $rules = [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric|between:0,150',
        ];

        $messages = [
            'name.required' => '名前は必ず入力してください。',
            'mail.email' => 'メールアドレスが必要です。',
            'age.numeric' => '年齢を整数で記入ください。',
            'age.between' => '年齢は0〜150の間で入力ください。',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails())
        {
            return redirect($request->path())
                ->withErrors($validator)
                ->withInput();
        }

        return view('middleware.validation', ['msg' => '正しく入力されました！']);
    }

    public function sometimes(Request $request)
    {
        $rules = [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric',
        ];

        $messages = [
            'name.required' => '名前は必ず入力してください。',
            'mail.email' => 'メールアドレスが必要です。',
            'age.numeric' => '年齢を整数で記入ください。',
            'age.min' => '年齢は0以上で入力ください。',
            'age.max' => '年齢は200以下で入力ください。',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        // Add rules
        $validator->sometimes('age', 'min:0', function($input)
        {
            return is_numeric($input->age);
        });
        $validator->sometimes('age', 'max:200', function($input)
        {
            return is_numeric($input->age);
        });

        if ($validator->fails())
        {
            return redirect($request->path())
                ->withErrors($validator)
                ->withInput();
        }

        return view('middleware.validation', ['msg' => '正しく入力されました！']);
    }

    public function helloValidator(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric|between:0,150|hello:4,5',
        ]);

        if ($validator->fails()) {
            return redirect($request->path())
                ->withErrors($validator)
                ->withInput();
        }

        return view('middleware.validation', ['msg' => '正しく入力されました！']);
    }

    public function nabeRule(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric|between:0,150|nabe',
        ]);

        if ($validator->fails()) {
            return redirect($request->path())
                ->withErrors($validator)
                ->withInput();
        }

        return view('middleware.validation', ['msg' => '正しく入力されました！']);
    }

    public function myRule(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mail' => 'email',
            // 'age' => ['numeric|between:0,150', new MyRule(7)],
            'age' => ['numeric', 'between:0,150', new MyRule(7)],
        ]);

        if ($validator->fails()) {
            return redirect($request->path())
                ->withErrors($validator)
                ->withInput();
        }

        return view('middleware.validation', ['msg' => '正しく入力されました！']);
    }
}
