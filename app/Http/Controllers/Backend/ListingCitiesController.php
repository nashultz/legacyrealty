<?php

namespace Legacy\Http\Controllers\Backend;

use Illuminate\Http\Request;

use Legacy\Http\Requests;
use Legacy\Http\Requests\StoreCityRequest;
use Legacy\Http\Requests\UpdateCityRequest;
use Legacy\ListingCity;

class ListingCitiesController extends Controller
{
    public function __construct(ListingCity $cities)
    {
        $this->cities = $cities;

        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = $this->cities->paginate(10);

        return view('backend.cities.index',compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ListingCity $city)
    {
        return view('backend.cities.form', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCityRequest $request)
    {
        $this->cities->create($request->only('name','address','city','state','zip'));

        return redirect(route('mylegacy.cities.index'))->with('status','City has been created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = $this->cities->findOrFail($id);

        return view('backend.cities.form', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCityRequest $request, $id)
    {
        $city = $this->cities->findOrFail($id);

        $city->fill($request->only('name','address','city','state','zip'))->save();

        return redirect(route('mylegacy.cities.edit',$city->id))->with('status','City has been updated.');
    }

    public function confirm($id)
    {
        $city = $this->cities->findOrFail($id);

        return view('backend.cities.confirm',compact('city'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = $this->cities->findOrFail($id);

        $city->delete();

        return redirect(route('mylegacy.cities.index'))->with('status','City has been deleted.');
    }
}
