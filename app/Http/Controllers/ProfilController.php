<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // ->except(['show']);
    }
    public function index()
    {

        $profiles = Profile::paginate(9);
        return view('profile.index', compact('profiles'));
    }
    public function show(Profile $profile)
    {
        // $id = $request->id;

        // $Profile =Profile::findOrFail($id);
        // if($Profile === Null){
        //     return abort(404);
        // }

        return view('profile.show', compact('profile'));
    }

    public function create()
    {
        return view('profile.create');
    }
    public function store(ProfileRequest $request)
    {


        //validation 
        $formFields = $request->validated();

        //Hash
        $formFields['password'] = Hash::make($request->password);

        //insert image
        $formFields['image'] = $request->file('image')->store('profile', 'public');

        $this->uploadImage($request, $formFields);


        //insertion profile
        Profile::create($formFields);

        //redirection
        return redirect()->route('profiles.index')->with('success', 'votre Compte est bien créé.');

    }
    public function destroy(Profile $profile)
    {
        $profile->delete();
        return to_route('profiles.index')->with('success', 'Le Profile a élé bien supprimer');
    }

    public function edit(Profile $profile,Request $request)
    {
        // if (!Gate::allows('update-publication',$publication)) {
        //     abort(403);
        // }

        // Gate::authorize('update-publication',$publication);

        // Gate::authorize('update',$publication);

        // $this->authorize('update',$publication);

        // if($request->user()->can('update',$publication)){
        //     abort(403);
        // }

        return view('profile.edit', compact('profile'));
    }
    public function update(ProfileRequest $request, Profile $profile)
    {
        $formFields = $request->validated();
        //Hash
        $formFields['password'] = Hash::make($request->password);

        //insert image
        $this->uploadImage($request, $formFields);

        
        $profile->fill($formFields)->save();
        return to_route('profiles.show', $profile->id)->with('success', 'Le Profile a élé bien Modification');

    }

    private function uploadImage(ProfileRequest $request, array &$formFields)
    {

        //insert image
        unset($formFields['image']);
        if ($request->hasfile('image')) {
            $formFields['image'] = $request->file('image')->store('profile', 'public');
        }
    }
}

