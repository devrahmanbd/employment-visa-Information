<?php

namespace App\Http\Controllers\Backend;

use App\Models\Visa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVisaRequest;
use App\Http\Requests\UpdateVisaRequest;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class VisaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
    {
        // If a search term is provided, filter by passport_no
        $visas = Visa::when($request->search, function ($query) use ($request) {
            return $query->where('passport_no', 'like', '%' . $request->search . '%');
        })
        ->latest() // Order by latest first
        ->paginate(10); // Paginate the results with 10 items per page

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
  public function show($id) {
    $visa = Visa::findOrFail($id);
    $url = route('admin.visas.show', $visa); // Resourceful route to the show method

    $logoPath = public_path('images/scanercode.png');

// চেক করুন লোগো ফাইলটি সঠিকভাবে আছে কিনা
if (!file_exists($logoPath)) {
    die('Logo file not found!');
}

// QR কোড তৈরি করুন
$qrCode = base64_encode(
    QrCode::format('png')
        ->size(150)
        ->color(53, 96, 156) // QR কোডের কালার (নীল - RGB: 53, 96, 156)
        ->backgroundColor(255, 255, 255) // ব্যাকগ্রাউন্ড সাদা
        ->merge($logoPath, 0.3, true) // লোগো যুক্ত করুন
        ->generate($url)
);

   // Generate the QR code
    return view('backend.pages.visa.show', compact('qrCode', 'visa'));
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