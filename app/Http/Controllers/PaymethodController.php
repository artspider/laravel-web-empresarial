<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymethodStoreRequest;
use App\Http\Requests\PaymethodUpdateRequest;
use App\Models\Paymethod;
use Illuminate\Http\Request;

class PaymethodController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paymethods = Paymethod::all();

        return view('paymethod.index', compact('paymethods'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('paymethod.create');
    }

    /**
     * @param \App\Http\Requests\PaymethodStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymethodStoreRequest $request)
    {
        $paymethod = Paymethod::create($request->validated());

        $request->session()->flash('paymethod.id', $paymethod->id);

        return redirect()->route('paymethod.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Paymethod $paymethod
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Paymethod $paymethod)
    {
        return view('paymethod.show', compact('paymethod'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Paymethod $paymethod
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Paymethod $paymethod)
    {
        return view('paymethod.edit', compact('paymethod'));
    }

    /**
     * @param \App\Http\Requests\PaymethodUpdateRequest $request
     * @param \App\Models\Paymethod $paymethod
     * @return \Illuminate\Http\Response
     */
    public function update(PaymethodUpdateRequest $request, Paymethod $paymethod)
    {
        $paymethod->update($request->validated());

        $request->session()->flash('paymethod.id', $paymethod->id);

        return redirect()->route('paymethod.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Paymethod $paymethod
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Paymethod $paymethod)
    {
        $paymethod->delete();

        return redirect()->route('paymethod.index');
    }
}
