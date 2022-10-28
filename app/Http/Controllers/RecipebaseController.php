<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecipebaseStoreRequest;
use App\Http\Requests\RecipebaseUpdateRequest;
use App\Models\Recipebase;
use Illuminate\Http\Request;

class RecipebaseController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $recipebases = Recipebase::all();

        return view('recipebase.index', compact('recipebases'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('recipebase.create');
    }

    /**
     * @param \App\Http\Requests\RecipebaseStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecipebaseStoreRequest $request)
    {
        $recipebase = Recipebase::create($request->validated());

        $request->session()->flash('recipebase.id', $recipebase->id);

        return redirect()->route('recipebase.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Recipebase $recipebase
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Recipebase $recipebase)
    {
        return view('recipebase.show', compact('recipebase'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Recipebase $recipebase
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Recipebase $recipebase)
    {
        return view('recipebase.edit', compact('recipebase'));
    }

    /**
     * @param \App\Http\Requests\RecipebaseUpdateRequest $request
     * @param \App\Models\Recipebase $recipebase
     * @return \Illuminate\Http\Response
     */
    public function update(RecipebaseUpdateRequest $request, Recipebase $recipebase)
    {
        $recipebase->update($request->validated());

        $request->session()->flash('recipebase.id', $recipebase->id);

        return redirect()->route('recipebase.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Recipebase $recipebase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Recipebase $recipebase)
    {
        $recipebase->delete();

        return redirect()->route('recipebase.index');
    }
}
