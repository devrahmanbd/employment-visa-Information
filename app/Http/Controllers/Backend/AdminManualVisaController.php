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
        $manual_visas = ManualVisa::latest()->paginate(10);
        return view('backend.pages.manual_visa.index', compact('manual_visas'));
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
            'passport_no' => 'required|unique:manual_visas',
            'dob' => 'required|date',
            'nationality_en' => 'required|string',
            'pdf_file' => 'required|mimes:pdf', // PDF validation
        ]);

        // Upload PDF
       if ($request->hasFile('pdf_file')) {
            $destinationPath = public_path('pdfs');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            $originalName = $request->file('pdf_file')->getClientOriginalName();
            $extension = $request->file('pdf_file')->getClientOriginalExtension();

            $fileName = date('Y-m-d_H-i-s') . '_' .pathinfo($originalName, PATHINFO_FILENAME) . '.' . $extension;
            $request->file('pdf_file')->move($destinationPath, $fileName);

            $pdfPath = 'pdfs/' . $fileName; 
        }


        // Store Visa
        ManualVisa::create([
            'passport_no' => $request->passport_no,
            'dob' => $request->dob,
            'nationality_en' => $request->nationality_en,
            'file_owner_name' => $originalName,
            'pdf_file' => $pdfPath,
        ]);

        return redirect()->route('admin.admin-manual-visas.index')->with('success', 'Manual Visa added successfully!');
    }

    // show Visa Details
    public function show($id)
    {
        $manual_visa = ManualVisa::findOrFail($id);
        return view('backend.pages.manual_visa.show', compact('manual_visa'));
    }

    // Show Edit Form
    public function edit(Visa $visa)
    {
        return view('backend.pages.manual_visa.edit', compact('manual_visa'));
    }

    // Update Visa
    public function update(Request $request, Visa $visa)
    {
        $request->validate([
            'passport_no' => 'required|unique:manual_visas,passport_no,' . $visa->id,
            'dob' => 'required|date',
            'nationality_en' => 'required|string',
            'pdf_file' => 'nullable|mimes:pdf',
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

        return redirect()->route('admin.admin-manual-visas.index')->with('success', 'Manual Visa updated successfully!');
    }

    // Delete Visa
    public function destroy(Visa $visa)
    {
        if ($visa->pdf_file) {
            \Storage::disk('public')->delete($visa->pdf_file);
        }
        $visa->delete();

        return redirect()->route('admin.admin-manual-visas.index')->with('success', 'Manual Visa deleted successfully!');
    }

    // Download Visa
    public function downloadManualVisa($id)
    {
        $manual_visa = ManualVisa::findOrFail($id);
        $filePath = public_path($manual_visa->pdf_file);
        $newFileName = $manual_visa->file_owner_name;
        return response()->download($filePath, $newFileName);
    }
}