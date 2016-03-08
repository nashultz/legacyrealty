<?php

namespace Legacy\Http\Controllers\Backend;

use Illuminate\Http\Request;

use Legacy\Http\Requests;
use Legacy\Http\Requests\StoreTypeRequest;
use Legacy\Http\Requests\UpdateTypeRequest;
use Legacy\ListingType;

class ListingTypesController extends Controller
{
    public function __construct(ListingType $types)
    {
        $this->types = $types;

        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = $this->types->paginate(10);

        return view('backend.types.index',compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ListingType $type)
    {
        return view('backend.types.form', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeRequest $request)
    {
        $this->types->create($request->only('name','address','type','state','zip'));

        return redirect(route('mylegacy.types.index'))->with('type','Type has been created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = $this->types->findOrFail($id);

        return view('backend.types.form', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTypeRequest $request, $id)
    {
        $type = $this->types->findOrFail($id);

        $type->fill($request->only('name','address','type','state','zip'))->save();

        return redirect(route('mylegacy.types.edit',$type->id))->with('type','Type has been updated.');
    }

    public function confirm($id)
    {
        $type = $this->types->findOrFail($id);

        return view('backend.types.confirm',compact('type'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = $this->types->findOrFail($id);

        $type->delete();

        return redirect(route('mylegacy.types.index'))->with('type','Type has been deleted.');
    }
}
