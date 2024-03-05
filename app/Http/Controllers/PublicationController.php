<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PublicationRequest;
use App\Models\Publication;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publications = Publication::latest()->paginate(3);
        return view('publication.index', compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('publication.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PublicationRequest $request)
    {

        $formFields = $request->validated();
        $this->uploadImage($request, $formFields);
        $formFields['profile_id'] = Auth::id();
        Publication::create($formFields);
        return to_route('publication.index')->with('success', 'votre publication a été bien create .');

    }
    private function uploadImage(PublicationRequest $request, array &$formFields)
    {
        //insert image
        unset($formFields['image']);
        if ($request->hasfile('image')) {
            $formFields['image'] = $request->file('image')->store('publication', 'public');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Publication $publication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publication $publication)
    {
        return view('publication.edit', compact('publication'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PublicationRequest $request, Publication $publication)
    {
        $formFields = $request->validated();
        $this->uploadImage($request, $formFields);
        $publication->fill($formFields)->save();
        return to_route('publication.index')->with('success', 'votre publication a été bien modifier .');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publication $publication)
    {
        $publication->delete();
        return to_route('publication.index')->with('success', 'votre publication a été bien supprimer .');


    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        $publications = Publication::where('titer', 'LIKE', "%$search%")->paginate(3);

        return view('publication.index', compact('publications'));
    }

}
