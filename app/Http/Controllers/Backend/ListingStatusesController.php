<?php

namespace Legacy\Http\Controllers\Backend;

use Illuminate\Http\Request;

use Legacy\Http\Requests;
use Legacy\Http\Requests\StoreStatusRequest;
use Legacy\Http\Requests\UpdateStatusRequest;
use Legacy\ListingStatus;

class ListingStatusesController extends Controller
{
    public function __construct(ListingStatus $statuses)
    {
        $this->statuses = $statuses;

        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = $this->statuses->paginate(10);

        return view('backend.statuses.index',compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ListingStatus $status)
    {
        return view('backend.statuses.form', compact('status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStatusRequest $request)
    {
        $this->statuses->create($request->only('name','address','status','state','zip'));

        return redirect(route('mylegacy.statuses.index'))->with('status','Status has been created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $status = $this->statuses->findOrFail($id);

        return view('backend.statuses.form', compact('status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStatusRequest $request, $id)
    {
        $status = $this->statuses->findOrFail($id);

        $status->fill($request->only('name','address','status','state','zip'))->save();

        return redirect(route('mylegacy.statuses.edit',$status->id))->with('status','Status has been updated.');
    }

    public function confirm($id)
    {
        $status = $this->statuses->findOrFail($id);

        return view('backend.statuses.confirm',compact('status'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = $this->statuses->findOrFail($id);

        $status->delete();

        return redirect(route('mylegacy.statuses.index'))->with('status','Status has been deleted.');
    }
}
