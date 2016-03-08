<?php

namespace Legacy\Http\Controllers\Backend;

use Illuminate\Http\Request;

use Legacy\Http\Requests;
use Legacy\Http\Requests\StoreSubtypeRequest;
use Legacy\Http\Requests\UpdateSubtypeRequest;
use Legacy\ListingSubtype;

class ListingSubtypesController extends Controller
{
    public function __construct(ListingSubtype $subtypes)
    {
        $this->subtypes = $subtypes;

        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subtypes = $this->subtypes->paginate(10);

        return view('backend.subtypes.index',compact('subtypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ListingSubtype $subtype)
    {
        return view('backend.subtypes.form', compact('subtype'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubtypeRequest $request)
    {
        $this->subtypes->create($request->only('name','address','subtype','state','zip'));

        return redirect(route('mylegacy.subtypes.index'))->with('subtype','Subtype has been created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subtype = $this->subtypes->findOrFail($id);

        return view('backend.subtypes.form', compact('subtype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubtypeRequest $request, $id)
    {
        $subtype = $this->subtypes->findOrFail($id);

        $subtype->fill($request->only('name','address','subtype','state','zip'))->save();

        return redirect(route('mylegacy.subtypes.edit',$subtype->id))->with('subtype','Subtype has been updated.');
    }

    public function confirm($id)
    {
        $subtype = $this->subtypes->findOrFail($id);

        return view('backend.subtypes.confirm',compact('subtype'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subtype = $this->subtypes->findOrFail($id);

        $subtype->delete();

        return redirect(route('mylegacy.subtypes.index'))->with('subtype','Subtype has been deleted.');
    }
}
