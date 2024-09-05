<?php

namespace App\Http\Controllers;
use IlluminateSupportFacadesRoute;
use Illuminate\Http\Request;
use App\Models\category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories  = category::all();
        return view('admin.category.category', compact('categories'));
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        category::create($request->all());
        return redirect()->route('category.index')->with('success', 'Categoria creada correctamente.');
    }

    public function destroy(category $category)
    {
        $category->delete();

        return redirect()->route('category.index')->with('error', 'Entidad eliminada correctamente.');
    }

    public function edit($id)
    {
        $category = category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    
    public function update(Request $request, $id)
    {
        $category = category::find($id);
        $category->name = $request->input('name');
        
        $category->save();

        return redirect()->route('category.index')->with('success', 'La entidad se ha actualizado correctamente.');
    }
}