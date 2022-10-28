<?php

namespace App\Http\Controllers;

use App\Http\Requests\DishStoreRequest;
use App\Http\Requests\DishUpdateRequest;
use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dishes = Dish::all();

        return view('dish.index', compact('dishes'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('dish.create');
    }

    /**
     * @param \App\Http\Requests\DishStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(DishStoreRequest $request)
    {
        $dish = Dish::create($request->validated());

        $request->session()->flash('dish.id', $dish->id);

        return redirect()->route('dish.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Dish $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Dish $dish)
    {
        return view('dish.show', compact('dish'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Dish $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Dish $dish)
    {
        return view('dish.edit', compact('dish'));
    }

    /**
     * @param \App\Http\Requests\DishUpdateRequest $request
     * @param \App\Models\Dish $dish
     * @return \Illuminate\Http\Response
     */
    public function update(DishUpdateRequest $request, Dish $dish)
    {
        $dish->update($request->validated());

        $request->session()->flash('dish.id', $dish->id);

        return redirect()->route('dish.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Dish $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Dish $dish)
    {
        $dish->delete();

        return redirect()->route('dish.index');
    }
}
