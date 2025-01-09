<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    public function index()
    {
        return Note::where('folder_id', request()->folder_id)->get();
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string', 'type' => 'required|string|in:text,pdf']);
        $note = Note::create($request->all());
        return response()->json($note, 201);
    }
}
