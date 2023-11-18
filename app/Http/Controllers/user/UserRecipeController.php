<?php

namespace App\Http\Controllers\user;

use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\Step;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class UserRecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipes = Recipe::where('user_id', Auth::user()->id)->latest()->get();
        return view('user.recipes.index', [
            "recipes" => $recipes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Recipe $recipe)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            "title" => "required",
            "description" => "required",
            "image" => "required",
        ]);

        $validatedIngredients = $request->validate([
            "ingredient.*" => "required",
        ]);

        $validatedSteps = $request->validate([
            "step.*" => "required",
        ]);

        $validatedData['slug'] = Str::slug($validatedData['title'], '-');

        $validatedData['user_id'] = Auth::user()->id;

        $recipe = Recipe::create($validatedData);
        $recipeId = $recipe->id;

        foreach($validatedIngredients['ingredient'] as $ingredient) {
            Ingredient::create([
                'ingredient' => $ingredient,
                'recipe_id' => $recipeId,
            ]);
        }

        foreach($validatedSteps['step'] as $step) {
            Step::create([
                'step' => $step,
                'recipe_id' => $recipeId
            ]);
        }

        return redirect()->route('user.recipes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Recipe $recipe)
    {
        $ingredient = Ingredient::where('recipe_id', $recipe->id)->get();
        $step = Step::where('recipe_id', $recipe->id)->get();

        return view('user.recipes.show', [
            'recipe' => $recipe,
            "ingredients" => $ingredient,
            "steps" => $step
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipe $recipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();

        return redirect()->route('user.recipes.index');
    }
}
