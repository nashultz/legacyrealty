<?php

namespace Legacy\Http\Controllers\Backend;

use Illuminate\Http\Request;

use Legacy\Http\Requests;
use Legacy\Http\Requests\StoreTitleRequest;
use Legacy\Http\Requests\UpdateTitleRequest;
use Legacy\Title;

class TitlesController extends Controller
{
    public function __construct(Title $titles)
    {
        $this->titles = $titles;

        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titles = $this->titles->paginate(10);

        return view('backend.titles.index',compact('titles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Title $title)
    {
        return view('backend.titles.form', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTitleRequest $request)
    {
        $this->titles->create($request->only('name','email','phone','cell','fax','bio','published','protected'));

        return redirect(route('mylegacy.titles.index'))->with('status','Title has been created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = $this->titles->findOrFail($id);

        return view('backend.titles.form', compact('title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTitleRequest $request, $id)
    {
        $title = $this->titles->findOrFail($id);

        $title->fill($request->only('name','email','phone','cell','fax','bio','published','protected'))->save();

        return redirect(route('mylegacy.titles.edit',$title->id))->with('status','Title has been updated.');
    }

    public function confirm($id)
    {
        $title = $this->titles->findOrFail($id);

        return view('backend.titles.confirm',compact('title'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $title = $this->titles->findOrFail($id);

        $title->delete();

        return redirect(route('mylegacy.titles.index'))->with('status','Title has been deleted.');
    }
}
