<?php

namespace App\Http\Controllers;

use App\Http\Requests\UnitStoreRequest;
use App\Http\Requests\UnitUpdateRequest;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $units = Unit::all();

        return view('unit.index', compact('units'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('unit.create');
    }

    /**
     * @param \App\Http\Requests\UnitStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UnitStoreRequest $request)
    {
        $unit = Unit::create($request->validated());

        $request->session()->flash('unit.id', $unit->id);

        return redirect()->route('unit.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Unit $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Unit $unit)
    {
        return view('unit.show', compact('unit'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Unit $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Unit $unit)
    {
        return view('unit.edit', compact('unit'));
    }

    /**
     * @param \App\Http\Requests\UnitUpdateRequest $request
     * @param \App\Models\Unit $unit
     * @return \Illuminate\Http\Response
     */
    public function update(UnitUpdateRequest $request, Unit $unit)
    {
        $unit->update($request->validated());

        $request->session()->flash('unit.id', $unit->id);

        return redirect()->route('unit.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Unit $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Unit $unit)
    {
        $unit->delete();

        return redirect()->route('unit.index');
    }
}
