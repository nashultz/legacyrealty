<?php

namespace Legacy\Http\Controllers\Backend;

use Illuminate\Http\Request;

use Legacy\Http\Requests;
use Legacy\Http\Requests\StoreOfficeRequest;
use Legacy\Http\Requests\UpdateOfficeRequest;
use Legacy\Office;

class OfficesController extends Controller
{
    public function __construct(Office $offices)
    {
        $this->offices = $offices;

        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offices = $this->offices->paginate(10);

        return view('backend.offices.index',compact('offices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Office $office)
    {
        return view('backend.offices.form', compact('office'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOfficeRequest $request)
    {
        $this->offices->create($request->only('name','address','city','state','zip'));

        return redirect(route('mylegacy.offices.index'))->with('status','Office has been created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $office = $this->offices->findOrFail($id);

        return view('backend.offices.form', compact('office'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOfficeRequest $request, $id)
    {
        $office = $this->offices->findOrFail($id);

        $office->fill($request->only('name','address','city','state','zip'))->save();

        return redirect(route('mylegacy.offices.edit',$office->id))->with('status','Office has been updated.');
    }

    public function confirm($id)
    {
        $office = $this->offices->findOrFail($id);

        return view('backend.offices.confirm',compact('office'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $office = $this->offices->findOrFail($id);

        $office->delete();

        return redirect(route('mylegacy.offices.index'))->with('status','Office has been deleted.');
    }
}
