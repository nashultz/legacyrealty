<?php

namespace Legacy\Http\Controllers\Backend;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Legacy\Http\Requests;
use Legacy\Http\Requests\StoreListingImageRequest;
use Legacy\Http\Requests\UpdateListingRequest;
use Legacy\Image;
use Legacy\Listing;

class ListingImagesController extends Controller
{
    public function __construct(Listing $listing, Image $images)
    {
        $this->listing = $listing;

        $this->images = $images;

        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($listing)
    {
        $listing = Listing::findOrFail($listing);
        $images = $this->images->where('imageable_id',$listing->id)->where('imageable_type','Legacy\Listing')->get();

        return view('backend.listings.image.index',compact('images','listing'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($listing, Image $image)
    {
        $listing = Listing::findOrFail($listing);
        return view('backend.listings.image.form', compact('listing','image'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreListingImageRequest $request, $listing)
    {
        $listing = Listing::findOrFail($listing);
        $image['name'] = $listing->id.'.'.$listing->slug.'.'.$request->file('file')->getClientOriginalName();
        $image['imageable_id'] = $listing->id;
        $image['imageable_type'] = 'Legacy\Listing';
        $this->images->create($image);

        $request->file('file')->move( base_path().'/public/images/listings/'.$listing->id.'-'.$listing->slug.'/',$image['name']);

        return redirect(route('mylegacy.listings.{listing}.images.index',$listing->id))->with('status','Listing Image has been created.');
    }

    public function confirm($listing, $id)
    {
        $listing = $this->listing->findOrFail($listing);
        $image = $this->images->findOrFail($id);

        return view('backend.listings.image.confirm',compact('listing','image'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($listing, $id)
    {
        $image = $this->images->findOrFail($id);
        $listing = $this->listing->findOrFail($listing);

        $image->delete();

        File::delete(base_path().'/public/images/listings/'.$listing->name.'/'.$image->name);

        return redirect(route('mylegacy.listings.{listing}.images.index',$listing->id))->with('status','Listing Image has been deleted.');
    }
}
