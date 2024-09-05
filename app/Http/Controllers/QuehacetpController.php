<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\multimedia;

class QuehacetpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $multimedia  = multimedia::where('category_id', '2')->get();
        $lineas = multimedia::where('category_id', '3')->get();
        return view('users.info', ['multimedia' => $multimedia], ['lineas' => $lineas]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
