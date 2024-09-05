<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\challenge_filter_category;
use App\Models\bootcamps;
use App\Models\sponsor;


class bootcampController extends Controller
{
    public function index()
    {
        return view('admin.bootcamp.panelBootcamp');
    }

    public function bootcampCategory()
    {
        $category = challenge_filter_category::paginate(10);
        return view('admin.bootcamp.categoryBootcamp.categoryBootcamp', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        challenge_filter_category::create($request->all());
        return redirect()->route('bootcampCategory')->with('success', 'Categoria creada correctamente.');
    }

    public function destroy(challenge_filter_category $category)
    {
        $category->delete();
        return redirect()->route('bootcampCategory')->with('error', 'Categoria eliminada correctamente.');
    }

    public function edit($id)
    {
        $category = challenge_filter_category::findOrFail($id);
        return view('admin.bootcamp.categoryBootcamp.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = challenge_filter_category::findOrFail($id);
        $category->name = $request->input('name');
        $category->save();

        return redirect()->route('bootcampCategory')->with('success', 'Categoría actualizada con éxito');
    }

    public function bootcamp()
    {
        $category = challenge_filter_category::all();
        $bootcamps = bootcamps::paginate(10);
        $sponsors = sponsor::all();
        return view('admin.bootcamp.bootcampLanding.bootcamp', compact('category', 'bootcamps', 'sponsors'));
    }


    public function storebootcamp(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:2000',
            'img_url' => 'nullable|image',
            'file' => 'nullable|mimes:pdf',
            'url_course' => 'required|string',
            'id_challenge_filter_category' => 'required|exists:challenge_filter_category,id',
            'sponsors' => 'nullable|array',
            'sponsors.*' => 'exists:sponsor,id'
        ]);
    
        $bootcamp = new bootcamps();
        $bootcamp->name = $request->name;
        $bootcamp->description = $request->description;
        $bootcamp->url_course = $request->url_course;
        $bootcamp->id_challenge_filter_category = $request->id_challenge_filter_category;
    
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/pdf', $filename);
            $bootcamp->file = $filename;
        }
    
        if ($request->hasFile('img_url')) {
            $file = $request->file('img_url');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/img', $filename);
            $bootcamp->img_url = $filename;
        }
    
        $bootcamp->save();
    
        if ($request->has('sponsors')) {
            $bootcamp->sponsors()->sync($request->sponsors);
        }
    
        return redirect()->route('bootcampLanding')->with('success', 'Bootcamp creado exitosamente.');
    }
    



    public function destroybootcamp(bootcamps $bootcamp)
    {
        $bootcamp->delete();
        return redirect()->route('bootcampLanding')->with('error', 'Bootcamp eliminada correctamente.');
    }

    public function editbootcamp($id)
    {
        $category = challenge_filter_category::all();
        $bootcamps = bootcamps::findOrFail($id);
        $sponsors = sponsor::all();
        $selectedSponsors = $bootcamps->sponsors->pluck('id')->toArray();
        return view('admin.bootcamp.bootcampLanding.edit', compact('bootcamps', 'category', 'sponsors', 'selectedSponsors'));
    }


    public function updatebootcamp(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:2000',
            'img_url' => 'nullable|image',
            'file' => 'nullable|mimes:pdf',
            'url_course' => 'required|string',
            'id_challenge_filter_category' => 'required|exists:challenge_filter_category,id',
            'sponsors' => 'nullable|array',
            'sponsors.*' => 'exists:sponsor,id'
        ]);

        $bootcamp = bootcamps::findOrFail($id);

        $bootcamp->name = $request->input('name');
        $bootcamp->description = $request->input('description');
        $bootcamp->url_course = $request->input('url_course');
        $bootcamp->id_challenge_filter_category = $request->input('id_challenge_filter_category');

        if ($request->hasFile('img_url')) {
            if ($bootcamp->img_url && Storage::exists('public/img/' . $bootcamp->img_url)) {
                Storage::delete('public/img/' . $bootcamp->img_url);
            }

            $file = $request->file('img_url');
            $filename = time() . '-' . $file->getClientOriginalName();
            $path = $file->storeAs('public/img', $filename);
            $bootcamp->img_url = $filename;
        }

        if ($request->hasFile('file')) {
            if ($bootcamp->file && Storage::exists('public/pdf/' . $bootcamp->file)) {
                Storage::delete('public/pdf/' . $bootcamp->file);
            }

            $file = $request->file('file');
            $filename = time() . '-' . $file->getClientOriginalName();
            $path = $file->storeAs('public/pdf', $filename);
            $bootcamp->file = $filename;
        }

        $bootcamp->save();

        // Sincronizar los sponsors con el bootcamp actualizado
        if ($request->has('sponsors')) {
            $bootcamp->sponsors()->sync($request->sponsors);
        }

        return redirect()->route('bootcampLanding')->with('success', 'Bootcamp actualizado con éxito');
    }


    public function clientBootcamp()
    {
        $categories = challenge_filter_category::with('bootcamps')->get();

        return view('users.bootcamp', compact('categories'));
    }

    public function show($id)
    {
        $bootcamp = bootcamps::findOrFail($id);
        $sponsors = $bootcamp->sponsors; // Asegúrate de que esta relación esté definida en tu modelo

        return view('users.viewBootcamp', compact('bootcamp', 'sponsors'));
    }


    public function bootcampSponsor()
    {
        $sponsor = sponsor::paginate(10);
        return view('admin.bootcamp.bootcampSponsor.sponsor', compact('sponsor'));
    }

    public function storeSponsor(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'img_url' => 'nullable|image',
        ]);

        $sponsor = new sponsor();
        $sponsor->name = $request->name;

        if ($request->hasFile('img_url')) {
            $file = $request->file('img_url');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/img', $filename);
            $sponsor->img_url = $filename;
        }

        $sponsor->save();
        return redirect()->route('bootcampSponsor')->with('success', 'Instituciones creado exitosamente.');
    }

    public function destroySponsor(sponsor $sponsor)
    {
        $sponsor->delete();
        return redirect()->route('bootcampSponsor')->with('error', 'Instituciones eliminada correctamente.');
    }

    public function editSponsor($id)
    {

        $sponsor = sponsor::findOrFail($id);
        return view('admin.bootcamp.bootcampSponsor.edit', compact('sponsor'));
    }

    public function updateSponsor(Request $request, $id)
    {
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'img_url' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $sponsor = sponsor::findOrFail($id);

        
        $sponsor->name = $request->input('name');
       
        if ($request->hasFile('img_url')) {
            if ($sponsor->img_url && Storage::exists('public/img/' . $sponsor->img_url)) {
                Storage::delete('public/img/' . $sponsor->img_url);
            }

            $file = $request->file('img_url');
            $filename = time() . '-' . $file->getClientOriginalName();
            $path = $file->storeAs('public/img', $filename);
            $sponsor->img_url = $filename;
        }

        $sponsor->save();

        return redirect()->route('bootcampSponsor')->with('success', 'Instituciones actualizado con éxito');
    }
}
