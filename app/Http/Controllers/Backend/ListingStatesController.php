<?php

namespace Legacy\Http\Controllers\Backend;

use Illuminate\Http\Request;

use Legacy\Http\Requests;
use Legacy\Http\Requests\StoreStateRequest;
use Legacy\Http\Requests\UpdateStateRequest;
use Legacy\ListingState;

class ListingStatesController extends Controller
{
    public function __construct(ListingState $states)
    {
        $this->states = $states;

        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = $this->states->paginate(10);

        return view('backend.states.index',compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ListingState $state)
    {
        return view('backend.states.form', compact('state'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStateRequest $request)
    {
        $this->states->create($request->only('name','address','city','state','zip'));

        return redirect(route('mylegacy.states.index'))->with('status','State has been created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $state = $this->states->findOrFail($id);

        return view('backend.states.form', compact('state'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStateRequest $request, $id)
    {
        $state = $this->states->findOrFail($id);

        $state->fill($request->only('name','address','city','state','zip'))->save();

        return redirect(route('mylegacy.states.edit',$state->id))->with('status','State has been updated.');
    }

    public function confirm($id)
    {
        $state = $this->states->findOrFail($id);

        return view('backend.states.confirm',compact('state'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $state = $this->states->findOrFail($id);

        $state->delete();

        return redirect(route('mylegacy.states.index'))->with('status','State has been deleted.');
    }
}
