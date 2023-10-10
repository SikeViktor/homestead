<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Breed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $animals = Animal::where("owner_id", Auth::user()->id)->paginate(8);

        return view('animals.index', compact('animals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breeds = Breed::all();

        return view('animals.create', compact('breeds'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'breed' => 'required',
            'gender' => 'required',
            'description' => 'required',
            'color' => 'required',
            'birth_of_year' => 'required',
        ]);

        $animal = new Animal();
        $animal->name = $request->input('name');
        $animal->breed_id = $request->input('breed');
        $animal->gender = $request->input('gender');
        $animal->description = $request->input('description');
        $animal->color = $request->input('color');
        $animal->birth_of_year = $request->input('birth_of_year');
        $animal->alive = '1';
        $animal->owner_id = auth()->id();
        $animal->image_url = $request->input('image_url');

        $animal->save();

        return redirect()->route('animals.index')->with('success', 'Az új állat sikeresen létrehozva.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Animal $animal)
    {
        $animals = Animal::where("owner_id", $animal->owner_id)
            ->whereNotIn("id", [$animal->id])
            ->take(6)
            ->get();

        return view('animals.show', compact('animal', 'animals'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Animal $animal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Animal $animal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animal $animal)
    {
        //
    }

    private function isOwner(Animal $animal)
    {

        if ($animal->owner != auth()->id()) {
            abort(403, "Nem vagy jogosult végrehajtani!");
        }

        return true;
    }
}
