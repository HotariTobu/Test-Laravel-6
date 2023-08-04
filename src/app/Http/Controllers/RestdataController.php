<?php

namespace App\Http\Controllers;

use App\Models\Restdata;
use Illuminate\Http\Request;

class RestdataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Restdata::all()->toArray();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rest.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $restdata = new Restdata($request->all());
        $restdata->save();
        return redirect('/rest');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Restdata::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
