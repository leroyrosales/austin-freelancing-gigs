<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
   public function index() {
    return view('listings.index', [
        'heading' => 'Latest gigs',
        'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
    ]);
   }

   public function create(){
    return view('listings.create');
   }

   public function show(Listing $listing) {
    return view('listings.show', [
        'listing' => $listing
    ]);
   }

   public function store(Request $request) {
    $formFields = $request->validate([
        'title' => 'required',
        'company' => ['required', Rule::unique('listings', 'company')],
        'location' => 'required',
        'website' => 'required',
        'email' => ['required', 'email'],
        'description' => 'required',
        'tags' => 'required'
    ]);

    if($request->hasFile('logo')){
        $formFields['logo'] = $request->file('logo')->store('logos', 'public');
    }

    $formFields['user_id'] = auth()->id();

    Listing::create($formFields);


    return redirect('/')->with('message', 'Listing created successfully.');
   }

   public function edit(Listing $listing){
    return view('listings.edit', ['listing' => $listing]);
   }

   public function update(Request $request, Listing $listing) {
    $formFields = $request->validate([
        'title' => 'required',
        'company' => ['required'],
        'location' => 'required',
        'website' => 'required',
        'email' => ['required', 'email'],
        'description' => 'required',
        'tags' => 'required'
    ]);

    if($request->hasFile('logo')){
        $formFields['logo'] = $request->file('logo')->store('logos', 'public');
    }

    $listing->update($formFields);


    return back()->with('message', 'Updated listing successfully.');
   }

   public function destroy(Listing $listing){
    $listing->delete();
    return redirect('/')->with('message', 'Deleted listing successfully.');
   }
}
