<?php

namespace Legacy\Http\Controllers\Backend;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Legacy\Employee;
use Legacy\Http\Requests;
use Legacy\Http\Requests\StoreEmployeeImageRequest;
use Legacy\Image;

class EmployeeImagesController extends Controller
{
    public function __construct(Employee $employee, Image $images)
    {
        $this->employee = $employee;

        $this->images = $images;

        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($employee)
    {
        $employee = Employee::findOrFail($employee);
        $images = $this->images->where('imageable_id',$employee->id)->where('imageable_type','Legacy\Employee')->get();

        return view('backend.employees.image.index',compact('images','employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($employee, Image $image)
    {
        $employee = Employee::findOrFail($employee);
        return view('backend.employees.image.form', compact('employee','image'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeImageRequest $request, $employee)
    {
        $employee = Employee::findOrFail($employee);
        $image['name'] = $employee->id.'.'.$request->file('file')->getClientOriginalName();
        $image['imageable_id'] = $employee->id;
        $image['imageable_type'] = 'Legacy\Employee';
        $this->images->create($image);

        $request->file('file')->move( base_path().'/public/images/employees/'.$employee->name.'/',$image['name']);

        return redirect(route('mylegacy.employees.{employee}.images.index',$employee->id))->with('status','Employee Image has been created.');
    }

    public function confirm($employee, $id)
    {
        $employee = $this->employee->findOrFail($employee);
        $image = $this->images->findOrFail($id);

        return view('backend.employees.image.confirm',compact('employee','image'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($employee, $id)
    {
        $image = $this->images->findOrFail($id);
        $employee = $this->employee->findOrFail($employee);

        $image->delete();

        File::delete(base_path().'/public/images/employees/'.$employee->name.'/'.$image->name);

        return redirect(route('mylegacy.employees.{employee}.images.index',$employee->id))->with('status','Employee Image has been deleted.');
    }
}
