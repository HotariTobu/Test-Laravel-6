<?php

namespace App\Http\Controllers\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BuilderController extends Controller
{
    public function select($page = null)
    {
        if (is_numeric($page))
        {
            $count = 2;
            $items = DB::table('people')->offset($page * $count)->limit($count)->get();
        }
        else
        {
            $items = DB::table('people')->get();
        }

        return view('db.select', ['items' => $items]);
    }

    public function only($id)
    {
        $item = DB::table('people')->where('id', $id)->first();
        return view('db.only', ['item' => $item]);
    }

    public function under($age)
    {
        $items = DB::table('people')->where('age', '<', $age)->get();
        return view('db.select', ['items' => $items]);
    }

    public function and($id, $age)
    {
        $item = DB::table('people')->where('id', $id)->where('age', '<', $age)->first();
        return view('db.only', ['item' => $item]);
    }

    public function or($id, $age)
    {
        $items = DB::table('people')->where('id', $id)->orWhere('age', '<', $age)->get();
        return view('db.select', ['items' => $items]);
    }

    public function raw($id, $age)
    {
        $items = DB::table('people')->whereRaw('id = :id or age < :age', ['id' => $id, 'age' => $age])->get();
        return view('db.select', ['items' => $items]);
    }

    public function orderBy($column)
    {
        $items = DB::table('people')->orderBy($column)->get();
        return view('db.select', ['items' => $items]);
    }

    public function insert(Request $request)
    {
        $values = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::table('people')->insert($values);

        return redirect($request->path() . '/../select');
    }

    public function update(Request $request)
    {
        $values = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::table('people')->where('id', $request->id)->update($values);

        return redirect($request->path() . '/../select');
    }

    public function delete(Request $request)
    {
        // DB::table('people')->where('id', $request->id)->delete();
        DB::table('people')->delete($request->id);

        return redirect($request->path() . '/../select');
    }
}
