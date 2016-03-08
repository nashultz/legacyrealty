<?php

namespace Legacy\Http\Controllers\Backend;

use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Legacy\Employee;
use Legacy\Http\Requests;
use Legacy\Http\Requests\StoreListingRequest;
use Legacy\Http\Requests\UpdateListingRequest;
use Legacy\Listing;
use Legacy\ListingCity;
use Legacy\ListingCounty;
use Legacy\ListingState;
use Legacy\ListingStatus;
use Legacy\ListingSubtype;
use Legacy\ListingType;

class ListingsController extends Controller
{
    public function __construct(Listing $listings)
    {
        $this->listings = $listings;

        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listings = $this->listings->paginate(15);

        return view('backend.listings.index',compact('listings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Listing $listing)
    {
        $lstat = ListingStatus::lists('name','id');
        $lcity = ListingCity::lists('name','id');
        $lcounty = ListingCounty::lists('name','id');
        $lstate = ListingState::lists('name','id');
        $ltype = ListingType::lists('name','id');
        $lsubtype = ListingSubtype::lists('name','id');
        $agents = Employee::lists('name','id');
        return view('backend.listings.form', compact('listing','lstat','lcity','lcounty','lstate','ltype','lsubtype','agents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreListingRequest $request)
    {
        $request['slug'] = Str::slug($request['address']);
        $this->listings->create($request->all());

        return redirect(route('mylegacy.listings.index'))->with('status','Listing has been created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listing = $this->listings->findOrFail($id);
        $lstat = ListingStatus::lists('name','id');
        $lcity = ListingCity::lists('name','id');
        $lcounty = ListingCounty::lists('name','id');
        $lstate = ListingState::lists('name','id');
        $ltype = ListingType::lists('name','id');
        $lsubtype = ListingSubtype::lists('name','id');
        $agents = Employee::lists('name','id');
        return view('backend.listings.form', compact('listing','lstat','lcity','lcounty','lstate','ltype','lsubtype','agents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateListingRequest $request, $id)
    {
        $listing = $this->listings->findOrFail($id);
        $request['slug'] = Str::slug($request['address']);
        $listing->fill($request->all())->save();

        return redirect(route('mylegacy.listings.edit',$listing->id))->with('status','Listing has been updated.');
    }

    public function confirm($id)
    {
        $listing = $this->listings->findOrFail($id);

        return view('backend.listings.confirm',compact('listing'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listing = $this->listings->findOrFail($id);

        $listing->delete();

        return redirect(route('mylegacy.listings.index'))->with('status','Listing has been deleted.');
    }
}
