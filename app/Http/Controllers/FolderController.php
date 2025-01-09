<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folder;

class FolderController extends Controller
{
    public function index()
    {
        return Folder::where('user_id', auth()->id())->get();
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string']);
        $folder = Folder::create(['name' => $request->name, 'user_id' => auth()->id()]);
        return response()->json($folder, 201);
    }
}
