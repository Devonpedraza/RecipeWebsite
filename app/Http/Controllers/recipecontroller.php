<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use \App\Models\recipes;
use \App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf; // Add at the top

class recipecontroller extends Controller
{
    public function index()
    {
        $recipes = recipes::findMany([1, 2, 3]);
        return view('recipes.index', compact('recipes'));
    }
    public function showall()
    {
        $recipes = recipes::orderBy('created_at', 'desc')->paginate(9); // 9 per page
        return view('recipes.recipes', compact('recipes'));
    }
    public function show($id)
    {
        $recipe = recipes::findOrFail($id);
        if (!$recipe) {
            return redirect()->route('recipes.index')->with('error', 'Recipe not found.');
        }
        return view('recipes.instructions', compact('recipe'));
    }
    public function create()
    {
        return view('recipes.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'difficulty' => 'required|string|in:Easy,Medium,Hard',
            'prep_time' => 'required|string',
            'cook_time' => 'required|string',
            'description' => 'required|string',
            'ingredients' => 'required|string',
            'instructions' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $recipe = new recipes();
        $recipe->Title = $request->title;
        $recipe->Difficulty = $request->difficulty;
        $recipe->Prep_Time = $request->prep_time;
        $recipe->Cook_Time = $request->cook_time;
        $recipe->Description = $request->description;
        $recipe->Ingredients = $request->ingredients;
        $recipe->Instructions = $request->instructions;

        $recipe->user_id = Auth::id(); // Make sure to import Auth facade

        if ($request->hasFile('image')) {
            $recipe->Image = $request->file('image')->store('images', 'public');
        }

        $recipe->save();

        return redirect()->route('recipes.myrecipes')->with('success', 'Recipe created successfully.');
    }
    public function myrecipes()
    {
        $myRecipes = recipes::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        $favoriteRecipes = Auth::user()->favoriteRecipes()->orderBy('created_at', 'desc')->get();
        return view('recipes.myrecipes', compact('myRecipes', 'favoriteRecipes'));
    }
    public function favorite($id)
    {

        $recipe = recipes::findOrFail($id);
        Auth::user()->favoriteRecipes()->syncWithoutDetaching([$recipe->id]);
        return back()->with('success', 'Recipe added to your favorites!');
    }
    public function unfavorite($id)
    {
        $recipe = recipes::findOrFail($id);
        Auth::user()->favoriteRecipes()->detach($recipe->id);
        return back()->with('success', 'Recipe removed from your favorites!');
    }
    public function downloadPdf($id)
    {
        $recipe = recipes::findOrFail($id);
        $pdf = Pdf::loadView('recipes.pdf', compact('recipe'));
        return $pdf->download($recipe->Title . '.pdf');
    }
}
