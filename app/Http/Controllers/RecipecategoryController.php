<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecipecategoryStoreRequest;
use App\Http\Requests\RecipecategoryUpdateRequest;
use App\Models\Recipecategory;
use Illuminate\Http\Request;

class RecipecategoryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $recipecategories = Recipecategory::all();

        return view('recipecategory.index', compact('recipecategories'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('recipecategory.create');
    }

    /**
     * @param \App\Http\Requests\RecipecategoryStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecipecategoryStoreRequest $request)
    {
        $recipecategory = Recipecategory::create($request->validated());

        $request->session()->flash('recipecategory.id', $recipecategory->id);

        return redirect()->route('recipecategory.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Recipecategory $recipecategory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Recipecategory $recipecategory)
    {
        return view('recipecategory.show', compact('recipecategory'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Recipecategory $recipecategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Recipecategory $recipecategory)
    {
        return view('recipecategory.edit', compact('recipecategory'));
    }

    /**
     * @param \App\Http\Requests\RecipecategoryUpdateRequest $request
     * @param \App\Models\Recipecategory $recipecategory
     * @return \Illuminate\Http\Response
     */
    public function update(RecipecategoryUpdateRequest $request, Recipecategory $recipecategory)
    {
        $recipecategory->update($request->validated());

        $request->session()->flash('recipecategory.id', $recipecategory->id);

        return redirect()->route('recipecategory.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Recipecategory $recipecategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Recipecategory $recipecategory)
    {
        $recipecategory->delete();

        return redirect()->route('recipecategory.index');
    }
}
