<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'full_phone_number' => 'nullable|string|max:20',
            'nationality' => 'required|string|max:100',
            'subject' => 'required|string|max:500',
        ]);

        Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->full_phone_number,
            'nationality' => $request->nationality,
            'subject' => $request->subject,
        ]);

        return back()->with('success', 'Message sent successfully!');
    }

   
    public function index() {
        $messages = Message::orderBy('status', 'asc')->orderBy('created_at', 'desc')->get();
        return view('backend.pages.messages.index', compact('messages'));
    }

    
    public function show($id) {
        $message = Message::findOrFail($id);
        $message->update(['status' => 'seen']);
        return view('backend.pages.messages.show', compact('message'));
    }
}
