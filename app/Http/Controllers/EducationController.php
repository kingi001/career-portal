<?php

namespace App\Http\Controllers;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EducationController extends Controller
{
    /**
     * Display the list of education records.
     */
    public function index()
    {
        $educations = Education::where('user_id', Auth::id())->orderBy('start_date', 'desc')->get();
        return view('education.academic-qualifications.lists.list-education', compact('educations'));
    }

    /**
     * Store a new education qualification.
     */
    public function store(Request $request)
    {
        // Validate input including document upload
        $request->validate([
            'institution' => 'required|string|max:255',
            'level_of_study' => 'required|string',
            'field_of_study' => 'required|string|max:255',
            'award' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'academic_document' => 'nullable|file|mimes:pdf,jpg,png|max:2048', // Accept PDF, JPG, PNG (Max 2MB)
        ]);

        // Initialize document path
        $documentPath = null;

        // Handle file upload
        if ($request->hasFile('academic_document')) {
            $academic_document = $request->file('academic_document');
            $documentPath = $academic_document->store('education_documents', 'public'); // Store in storage/app/public/education_documents
        }

        // Create education record
        Education::create([
            'user_id' => Auth::id(),
            'institution' => $request->institution,
            'level_of_study' => $request->level_of_study,
            'field_of_study' => $request->field_of_study,
            'award' => $request->award,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'academic_document' => $documentPath, // Store document path
        ]);

        return redirect()->back()->with('education_add_success', 'Education added successfully.');
    }

    /**
     * Fetch an education record for editing.
     */
    public function edit($id)
    {
        $education = Education::where('user_id', Auth::id())->findOrFail($id);
        return response()->json($education);
    }
    /**
     * Update an existing education qualification.
     */
    public function update(Request $request, $id)
    {
        // Validate input including document upload
        $request->validate([
            'institution' => 'required|string|max:255',
            'level_of_study' => 'required|string',
            'field_of_study' => 'required|string|max:255',
            'award' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'academic_document' => 'nullable|file|mimes:pdf,jpg,png|max:2048', // Accept PDF, JPG, PNG (Max 2MB)
        ]);

        // Find education record, ensuring it belongs to the authenticated user
        $education = Education::where('user_id', Auth::id())->findOrFail($id);

        // Handle file upload
        if ($request->hasFile('academic_document')) {
            // Delete old file if exists
            if (!empty($education->academic_document) && Storage::exists($education->academic_document)) {
                Storage::delete($education->academic_document);
            }

            // Upload new document
            $documentPath = $request->file('academic_document')->store('education_documents', 'public');
        } else {
            // Keep the existing document
            $documentPath = $education->academic_document;
        }

        // Update education record
        $education->update([
            'institution' => $request->institution,
            'level_of_study' => $request->level_of_study,
            'field_of_study' => $request->field_of_study,
            'award' => $request->award,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'academic_document' => $documentPath, // Store new or existing document path
        ]);

        return redirect()->back()->with('education_update_success', 'Education Updated successfully.');;
    }


    /**
     * Delete an education qualification.
     */
    public function destroy($id)
    {
        // Find the education record belonging to the authenticated user
        $education = Education::where('user_id', Auth::id())->findOrFail($id);

        // Check if there is an associated document and delete it
        if ($education->academic_document) {
            Storage::disk('public')->delete($education->academic_document);
        }

        // Delete the education record
        $education->delete();

        return redirect()->back()->with('success', 'Education and document deleted successfully.');
    }
}
