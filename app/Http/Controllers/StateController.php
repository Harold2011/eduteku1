<?php

namespace App\Http\Controllers;

use App\Models\status;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $states  = status::all();
        return view('admin.state.state', compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        status::create($request->all());
        return redirect()->route('state.index')->with('success', 'Estado creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(state $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $state = status::find($id);
        return view('admin.state.edit', compact('state'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $state = status::find($id);
        $state->name = $request->input('name');
        
        $state->save();

        return redirect()->route('state.index')->with('success', 'El estado se ha actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(status $state)
    {
        $state->delete();

        return redirect()->route('state.index')->with('error', 'Estado eliminada correctamente.');
    }
}
