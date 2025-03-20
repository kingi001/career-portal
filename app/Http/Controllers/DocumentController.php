<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;


class DocumentController extends Controller {
    /**
     * Display a listing of the documents.
     */
    public function index() {
        $documents = Document::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('documentupload.index', compact('documents'));
    }

    /**
     * Store newly uploaded documents.
     */
    public function store(Request $request) {
        // Validate the incoming request
        $request->validate([
            'documents.*' => 'required|mimes:pdf|max:2048', // PDF files only, max 2MB
            'labels.*' => 'required|string',
            'categories.*' => 'required|string',
            'certificate_types.*' => 'nullable|string'
        ]);

        // Ensure that files were actually uploaded
        if (!$request->hasFile('documents')) {
            return back()->with('error', 'No files uploaded.');
        }

        // Process each uploaded file
        foreach ($request->file('documents') as $index => $file) {
            // Store file in the 'public/documents' directory
            $path = $file->store('documents', 'public');

            // Create a new document record in the database
            Document::create([
                'user_id' => Auth::id(),
                'label' => $request->labels[$index],
                'category' => $request->categories[$index],
                'certificate_type' => Arr::get($request->certificate_types, $index, null), // Prevent undefined index error
                'file_path' => $path
            ]);
        }

        return back()->with('success', 'Documents uploaded successfully!');
    }

    /**
     * Remove the specified document from storage.
     */
    public function destroy(Document $document) {
        // Ensure the authenticated user owns the document before deleting
        if ($document->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        // Delete the file from storage
        Storage::disk('public')->delete($document->file_path);

        // Remove the record from the database
        $document->delete();

        return back()->with('success', 'Document deleted successfully!');
    }
}
