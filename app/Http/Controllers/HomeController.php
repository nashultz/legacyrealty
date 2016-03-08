<?php

namespace Legacy\Http\Controllers;

use Illuminate\Http\Request;

use Legacy\Employee;
use Legacy\Http\Requests;
use Legacy\Http\Controllers\Controller;
use Legacy\Listing;
use Legacy\Testimony;

class HomeController extends Controller
{
    public function index()
    {
        $featured = Listing::published()->latest()->featured()->take(8)->get();
        $latest = Listing::published()->latest()->take(3)->get();
        $testimonies = Testimony::published()->latest()->take(3)->get();
        return view('frontend.home', compact('featured','latest', 'testimonies', 'pages','ps'));
    }

    public function listings() {
        $listings = Listing::published()->latest()->paginate(10);
        return view('frontend.listings.index', compact('listings'));
    }

    public function viewListing($listing) {
        $listing = Listing::findOrFail($listing);
        return view('frontend.listings.show', compact('listing'));
    }

    public function agents() {
        $agents = Employee::published()->latest()->get();
        return view('frontend.agents.index', compact('agents'));
    }

    public function viewAgent($employee)
    {
        $agent = Employee::findOrFail($employee);
        return view('frontend.agents.show', compact('agent'));
    }
}
