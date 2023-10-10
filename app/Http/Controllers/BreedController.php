<?php

namespace App\Http\Controllers;

use App\Models\Breed;
use Illuminate\Http\Request;

class BreedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breeds = Breed::all();

        return view('animals.breeds.index', compact('breeds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('animals.breeds.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {        
        
        $request->validate([
            'breed_name' => 'required'
        ], [
            'breed_name.required' => 'A fajta megnevezése kötelező.'
        ]);

        $breed = new Breed();
        $breed->breed_name=$request->breed_name;

        $breed->save();

        return redirect('/animals/breeds')->with('success', 'Az új fajta sikeresen létrehozva.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Breed $breed)
    {
        $breeds = Breed::find($breed->id);        

        return view('animals.breeds.show', compact('breeds'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Breed $breed)
    {
        $breeds = Breed::find($breed->id);        

        return view('animals.breeds.edit', compact('breeds'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Breed $breed)
    {
        $request->validate([
            'breed_name' => 'required'
        ]);

        $breed->update($request->all());

        return redirect('/animals/breeds');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Breed $breed)
    {        
        $breed->delete();

        return redirect('/animals/breeds');
    }
}
