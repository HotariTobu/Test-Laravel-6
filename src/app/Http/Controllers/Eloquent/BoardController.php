<?php

namespace App\Http\Controllers\Eloquent;

use App\Http\Controllers\Controller;
use App\Models\Board;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BoardController extends Controller
{
    public function describe()
    {
        $items = Board::all();
        // $people1 = array_map(fn($b)=>$b->person, [...$items]);
        // $people2 = array_map(fn($b)=>Person::find($b->person_id), [...$items]);
        // $people3 = array_map(fn($b)=>DB::table('people')->find($b->person_id), [...$items]);
        return view('relation.describe', ['items' => $items]);
    }

    public function insert(Request $request)
    {
        $this->validate($request, Board::$rules);

        $person = new Board($request->all());
        $person->save();

        return redirect($request->path() . '/../describe');
    }

    public function update(Request $request)
    {
        $person = Board::withoutGlobalScopes()->find($request->id);

        if (isset($person))
        {
            $person->fill($request->all());
            $person->save();
        }

        return redirect($request->path() . '/../describe');
    }

    public function delete(Request $request)
    {
        Board::withoutGlobalScopes()->find($request->id)?->delete();
        return redirect($request->path() . '/../describe');
    }

    public function eager()
    {
        $items = Board::with('person')->get();
        return view('relation.describe', ['items' => $items]);
    }
}
