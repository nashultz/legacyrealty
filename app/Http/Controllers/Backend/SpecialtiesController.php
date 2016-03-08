<?php

namespace Legacy\Http\Controllers\Backend;

use Illuminate\Http\Request;

use Legacy\Http\Requests;
use Legacy\Http\Requests\StoreSpecialtyRequest;
use Legacy\Http\Requests\UpdateSpecialtyRequest;
use Legacy\Specialty;

class SpecialtiesController extends Controller
{
    public function __construct(Specialty $specialties)
    {
        $this->specialties = $specialties;

        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialties = $this->specialties->paginate(10);

        return view('backend.specialties.index',compact('specialties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Specialty $specialty)
    {
        return view('backend.specialties.form', compact('specialty'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSpecialtyRequest $request)
    {
        $this->specialties->create($request->only('name','email','phone','cell','fax','bio','published','protected'));

        return redirect(route('mylegacy.specialties.index'))->with('status','Specialty has been created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $office = $this->specialties->findOrFail($id);

        return view('backend.specialties.form', compact('specialty'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSpecialtyRequest $request, $id)
    {
        $office = $this->specialties->findOrFail($id);

        $office->fill($request->only('name','email','phone','cell','fax','bio','published','protected'))->save();

        return redirect(route('mylegacy.specialties.edit',$office->id))->with('status','Specialty has been updated.');
    }

    public function confirm($id)
    {
        $office = $this->specialties->findOrFail($id);

        return view('backend.specialties.confirm',compact('specialty'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $office = $this->specialties->findOrFail($id);

        $office->delete();

        return redirect(route('mylegacy.specialties.index'))->with('status','Specialty has been deleted.');
    }
}
