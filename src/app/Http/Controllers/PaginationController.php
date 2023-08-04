<?php

namespace App\Http\Controllers;

use App\Models\Restdata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaginationController extends Controller
{
    public function hello()
    {
        $people = DB::table('people')->simplePaginate(3);
        // $people = Person::simplePaginate(3);
        return view('pagination.hello', ['people' => $people]);
    }

    public function sort(Request $request)
    {
        $columns = ['name', 'mail', 'age'];
        $sort = $request->sort;
        if (!in_array($sort, $columns))
        {
            $sort = 'name';
        }

        $people = DB::table('people')->orderBy($sort)->simplePaginate(3);
        $data = ['people' => $people, 'sort' => $sort];
        return view('pagination.sort', $data);
    }

    public function all(Request $request)
    {
        $columns = ['name', 'mail', 'age'];
        $sort = $request->sort;
        if (!in_array($sort, $columns))
        {
            $sort = 'name';
        }

        $people = DB::table('people')->orderBy($sort)->paginate(3);
        $data = ['people' => $people, 'sort' => $sort];
        return view('pagination.sort', $data);
    }
}
