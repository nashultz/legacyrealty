<?php

namespace Legacy\Http\Controllers\Backend;

use Illuminate\Http\Request;

use Legacy\Http\Requests;
use Legacy\Http\Requests\StoreCountyRequest;
use Legacy\Http\Requests\UpdateCountyRequest;
use Legacy\ListingCounty;

class ListingCountiesController extends Controller
{
    public function __construct(ListingCounty $counties)
    {
        $this->counties = $counties;

        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counties = $this->counties->paginate(10);

        return view('backend.counties.index',compact('counties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ListingCounty $county)
    {
        return view('backend.counties.form', compact('county'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCountyRequest $request)
    {
        $this->counties->create($request->only('name','address','city','state','zip'));

        return redirect(route('mylegacy.counties.index'))->with('status','County has been created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $counties = $this->counties->findOrFail($id);

        return view('backend.counties.form', compact('counties'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCountyRequest $request, $id)
    {
        $counties = $this->counties->findOrFail($id);

        $counties->fill($request->only('name','address','city','state','zip'))->save();

        return redirect(route('mylegacy.counties.edit',$counties->id))->with('status','County has been updated.');
    }

    public function confirm($id)
    {
        $counties = $this->counties->findOrFail($id);

        return view('backend.counties.confirm',compact('counties'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $counties = $this->counties->findOrFail($id);

        $counties->delete();

        return redirect(route('mylegacy.counties.index'))->with('status','Counties has been deleted.');
    }
}
