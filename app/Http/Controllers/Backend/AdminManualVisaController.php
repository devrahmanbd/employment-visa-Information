<?php

namespace App\Http\Controllers\Backend;

use App\Models\ManualVisa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminManualVisaController extends Controller
{
     // Show All Visas
    public function index()
    {
        $visas = ManualVisa::latest()->paginate(10);
        return view('backend.pages.manual_visa.index', compact('visas'));
    }

    // Show Create Form
    public function create()
    {
        return view('backend.pages.manual_visa.create');
    }

    // Store Visa Data
    public function store(Request $request)
    {
        $request->validate([
            'passport_no' => 'required|unique:visas',
            'dob' => 'required|date',
            'nationality_en' => 'required|string',
            'pdf_file' => 'required|mimes:pdf|max:2048', // Only PDF, Max 2MB
        ]);

        // Upload PDF
        $pdfPath = $request->file('pdf_file')->store('pdfs', 'public');

        // Store Visa
        ManualVisa::create([
            'passport_no' => $request->passport_no,
            'dob' => $request->dob,
            'nationality_en' => $request->nationality_en,
            'pdf_file' => $pdfPath,
        ]);

        return redirect()->route('backend.pages.manual_visa.index')->with('success', 'Visa added successfully!');
    }

    // Show Edit Form
    public function edit(Visa $visa)
    {
        return view('backend.pages.manual_visa.edit', compact('visa'));
    }

    // Update Visa
    public function update(Request $request, Visa $visa)
    {
        $request->validate([
            'passport_no' => 'required|unique:visas,passport_no,' . $visa->id,
            'dob' => 'required|date',
            'nationality_en' => 'required|string',
            'pdf_file' => 'nullable|mimes:pdf|max:2048',
        ]);

        $pdfPath = $visa->pdf_file;
        if ($request->hasFile('pdf_file')) {
            $pdfPath = $request->file('pdf_file')->store('pdfs', 'public');
        }

        $visa->update([
            'passport_no' => $request->passport_no,
            'dob' => $request->dob,
            'nationality_en' => $request->nationality_en,
            'pdf_file' => $pdfPath,
        ]);

        return redirect()->route('backend.pages.manual_visa.index')->with('success', 'Visa updated successfully!');
    }

    // Delete Visa
    public function destroy(Visa $visa)
    {
        if ($visa->pdf_file) {
            \Storage::disk('public')->delete($visa->pdf_file);
        }
        $visa->delete();

        return redirect()->route('backend.pages.manual_visa.index')->with('success', 'Visa deleted successfully!');
    }
}