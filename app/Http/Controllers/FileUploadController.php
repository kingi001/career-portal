<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
     // Validate the file
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048', // Set your desired validation rules
        ]);

        // Store the file
        $path = $request->file('file')->store('uploads');

        return response()->json(['path' => $path], 200); // Return the file path or any relevant data
}
