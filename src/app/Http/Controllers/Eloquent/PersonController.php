<?php

namespace App\Http\Controllers\Eloquent;

use App\Http\Controllers\Controller;
use App\Models\Person;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class PersonController extends Controller
{
    public function select($page = null)
    {
        $items = Person::all();
        return view('db.select', ['items' => $items]);
    }

    public function describe($page = null)
    {
        $items = Person::withoutGlobalScopes()->get();
        return view('db.describe', ['items' => $items]);
    }

    public function only($id)
    {
        $item = Person::find($id);
        return view('db.only', ['item' => $item]);
    }

    public function children()
    {
        $items = Person::withoutGlobalScope('adult')->child()->get();
        return view('db.select', ['items' => $items]);
    }

    public function insert(Request $request)
    {
        $this->validate($request, Person::$rules);

        // $person = new Person;

        // $form = $request->all();
        // unset($form['_token']);

        // $person->fill($form);

        $person = new Person($request->all());
        $person->save();

        return redirect($request->path() . '/../select');
    }

    public function update(Request $request)
    {
        $person = Person::withoutGlobalScopes()->find($request->id);

        if (isset($person))
        {
            $person->fill($request->all());
            $person->save();
        }

        return redirect($request->path() . '/../select');
    }

    public function delete(Request $request)
    {
        Person::withoutGlobalScopes()->find($request->id)?->delete();
        return redirect($request->path() . '/../select');
    }

    public function publishers()
    {
        $items = Person::withoutGlobalScopes()->has('boards')->get();
        return view('db.describe', ['items' => $items]);
    }

    public function watchers()
    {
        $items = Person::withoutGlobalScopes()->doesntHave('boards')->get();
        return view('db.describe', ['items' => $items]);
    }
}
