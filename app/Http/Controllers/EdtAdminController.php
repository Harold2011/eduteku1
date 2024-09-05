<?php

namespace App\Http\Controllers;

use App\Models\multimedia;
use App\Models\status;
use App\Models\category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EdtAdminController extends Controller
{
    public function panel()
    {
        return view('admin.Edt.panel');
    }

    public function index()
    {
        $multimedia = Multimedia::with('category')->where('category_id', 5)->paginate(3);

        $status = Status::all();

        $category = Category::where('id', 5)->first();

        return view('admin.Edt.edt.edtAdmin', compact('multimedia', 'status', 'category'));
    }

    public function store(Request $request)
    {
        $datosValidados = $request->validate([
            'name' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'link' => 'required',
        ]);
        $link = $datosValidados['link'];
        $linkSave = Str::after($link, 'https://youtu.be/');
        
        $userId = Auth::id();
        $archivo = '';

            try {

                $multimedia = new Multimedia();
                $multimedia->name = $datosValidados['name'];
                $multimedia->descripcion = $datosValidados['descripcion'];
                $multimedia->url = $archivo;
                $multimedia->link = $linkSave;
                $multimedia->user_id = $userId;
                $multimedia->status_id = '1';
                $multimedia->category_id = '5';
                $multimedia->save();

                return redirect()->route('edtAdmin.index')->with('success', 'Archivo creado correctamente.');
            } catch (\Exception $e) {

            
                return back()->withErrors(['error' => $e->getMessage()]);
            }

        return back()->withErrors(['error' => 'Error al subir el archivo.']);
    }

    public function edit($id)
    {
        $multimedias = Multimedia::findOrFail($id);

        return view('admin.Edt.edt.edit', compact('multimedias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'link' => 'required',
        ]);

        $multimedia = Multimedia::findOrFail($id);

        $multimedia->name = $request->name;
        $multimedia->descripcion = $request->descripcion;

        $link =  $request['link'];
        $linkSave = Str::after($link, 'https://youtu.be/');
        $multimedia->link = $linkSave;

        $multimedia->save();

        return redirect()->route('edtAdmin.index')->with('success', 'Info actualizado correctamente.');
    }
}
