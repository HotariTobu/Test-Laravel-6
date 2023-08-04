<?php

namespace App\Http\Controllers\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    public function select(Request $request)
    {
        if (isset($request->id))
        {
            $params = ['id' => $request->id];
            $items = DB::select('SELECT * FROM `people` WHERE id = :id', $params);
        }
        else
        {
            $items = DB::select('SELECT * FROM `people`');
        }

        return view('db.select', ['items' => $items]);
    }

    public function insert(Request $request)
    {
        $params = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::insert('INSERT INTO `people` (name, mail, age) VALUES (:name, :mail, :age)', $params);

        return redirect($request->path() . '/../select');
    }

    public function update(Request $request)
    {
        $params = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
            'id' => $request->id,
        ];
        DB::update('UPDATE `people` SET name = :name, mail = :mail, age = :age WHERE id = :id', $params);

        return redirect($request->path() . '/../select');
    }

    public function delete(Request $request)
    {
        $params = [
            'id' => $request->id,
        ];
        DB::delete('DELETE FROM `people` WHERE id = :id', $params);

        return redirect($request->path() . '/../select');
    }
}
