<?php

namespace Legacy\Http\Controllers\Backend;

use Illuminate\Http\Request;

use Legacy\Http\Requests;
use Legacy\Http\Requests\StoreTestimonyRequest;
use Legacy\Http\Requests\UpdateTestimonyRequest;
use Legacy\Testimony;

class TestimoniesController extends Controller
{
    public function __construct(Testimony $testimonies)
    {
        $this->testimonies = $testimonies;

        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonies = $this->testimonies->paginate(10);

        return view('backend.testimonies.index',compact('testimonies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Testimony $testimony)
    {
        return view('backend.testimonies.form', compact('testimony'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestimonyRequest $request)
    {
        $this->testimonies->create($request->only('name','body','published','featured'));

        return redirect(route('mylegacy.testimonies.index'))->with('status','Testimony has been created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimony = $this->testimonies->findOrFail($id);

        return view('backend.testimonies.form', compact('testimony'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTestimonyRequest $request, $id)
    {
        $office = $this->testimonies->findOrFail($id);

        $office->fill($request->only('name','body','published','featured'))->save();

        return redirect(route('mylegacy.testimonies.edit',$office->id))->with('status','Testimony has been updated.');
    }

    public function confirm($id)
    {
        $testimony = $this->testimonies->findOrFail($id);

        return view('backend.testimonies.confirm',compact('testimony'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $office = $this->testimonies->findOrFail($id);

        $office->delete();

        return redirect(route('mylegacy.testimonies.index'))->with('status','Testimony has been deleted.');
    }
}
