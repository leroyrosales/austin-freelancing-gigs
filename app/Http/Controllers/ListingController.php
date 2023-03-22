<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
   public function index() {
    return view('listings.index', [
        'heading' => 'Latest gigs',
        'listings' => Listing::latest()->filter(request(['tag', 'search']))->get()
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
}
