<?php

namespace App\Http\Controllers\Backend;

use App\Models\Visa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVisaRequest;
use App\Http\Requests\UpdateVisaRequest;

class VisaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visas = Visa::latest()->paginate(10);
        return view('backend.pages.visa.index', compact('visas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('backend.pages.visa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVisaRequest $request)
    {
        Visa::create($request->validated());

        return redirect()->route('admin.visas.index')->with('success', 'Visa added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $visa = Visa::find($id); // Find the visa by the ID
        return view('backend.pages.visa.edit', compact('visa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVisaRequest $request, Visa $visa)
    {
    $visa->update($request->validated());

    return redirect()->route('admin.visas.index')->with('success', 'Visa updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visa $visa)
    {
        $visa->delete();
        return redirect()->route('admin.visas.index')->with('success', 'Visa deleted successfully');
    }
}