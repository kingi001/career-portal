<?php

namespace App\Http\Controllers;

use App\Models\DocumentUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentUploadController extends Controller
{
    public function index()
    {
        $documents = DocumentUpload::where('user_id', Auth::id())->get(); // Ensure it's a Collection
        return view('documentupload.index', compact('documents'));
    }


    public function store(Request $request)
    {
        $allowedCategories = [
            'application_letter' => 'Application Letter',
            'id_passport' => 'ID/Passport',
            'testimonials' => 'Testimonials'
        ];

        $validatedData = $request->validate([
            'application_letter' => 'nullable|file|mimes:pdf|max:2048',
            'id_passport' => 'nullable|file|mimes:pdf|max:2048',
            'testimonials' => 'nullable|array', // Ensure it's an array
            'testimonials.*' => 'nullable|file|mimes:pdf|max:2048' // Validate each file
        ]);

        foreach ($allowedCategories as $inputName => $category) {
            if ($request->hasFile($inputName)) {
                // If it's testimonials, handle multiple files
                $files = $inputName === 'testimonials' ? $request->file('testimonials') : [$request->file($inputName)];

                foreach ($files as $file) {
                    $path = $file->store('documents', 'public');
                    $size = $file->getSize();

                    DocumentUpload::create([
                        'user_id' => Auth::id(),
                        'label' => $file->getClientOriginalName(),
                        'category' => $category,
                        'file_path' => $path,
                        'size' => $size
                    ]);
                }
            }
        }

        return redirect()->route('documents.index')->with('success', 'Documents uploaded successfully.');
    }



    public function destroy(DocumentUpload $document)
    {
        if ($document->user_id !== Auth::id()) {
            abort(403);
        }

        Storage::disk('public')->delete($document->file_path);
        $document->delete();

        return back()->with('success', 'Document deleted successfully.');
    }
}

