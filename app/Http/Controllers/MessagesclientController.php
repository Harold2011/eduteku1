<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\messages;
use Carbon\Carbon;

class MessagesclientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'meil' => 'required',
            'message' => 'required',
        ]);

        $date = Carbon::now();
        $formattedDate = $date->toDateString();

        $message = new messages();
        $message->meil = $request['meil'];
        $message->message = $request['message'];
        $message->date = $formattedDate;
        $message->save();
        return redirect()->route('index.index')->with('success', 'Mensage enviado correctamente.');
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
