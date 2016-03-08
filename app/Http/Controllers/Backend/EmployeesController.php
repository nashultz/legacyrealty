<?php

namespace Legacy\Http\Controllers\Backend;

use Illuminate\Http\Request;

use Legacy\Employee;
use Legacy\Http\Requests;
use Legacy\Http\Requests\StoreEmployeeRequest;
use Legacy\Http\Requests\UpdateEmployeeRequest;
use Legacy\Office;
use Legacy\Specialty;
use Legacy\Title;

class EmployeesController extends Controller
{
    public function __construct(Employee $employees)
    {
        $this->employees = $employees;

        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = $this->employees->paginate(10);

        return view('backend.employees.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Employee $employee)
    {
        $offices = Office::lists('name','id');
        $titles = Title::lists('name','id');
        $specialties = Specialty::lists('name','id');
        return view('backend.employees.form', compact('employee','offices','titles','specialties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        $this->employees->create($request->only('office_id','title_id','specialty_id','name','email','phone','cell','fax','bio','published','protected'));

        return redirect(route('mylegacy.employees.index'))->with('status','Employee has been created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = $this->employees->findOrFail($id);
        $offices = Office::lists('name','id');
        $titles = Title::lists('name','id');
        $specialties = Specialty::lists('name','id');
        return view('backend.employees.form', compact('employee','offices','titles','specialties'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, $id)
    {
        $employee = $this->employees->findOrFail($id);

        $employee->fill($request->only('office_id','title_id','specialty_id','name','email','phone','cell','fax','bio','published','protected'))->save();

        return redirect(route('mylegacy.employees.edit',$employee->id))->with('status','Employee has been updated.');
    }

    public function confirm($id)
    {
        $employee = $this->employees->findOrFail($id);

        return view('backend.employees.confirm',compact('employee'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = $this->employees->findOrFail($id);

        $employee->delete();

        return redirect(route('mylegacy.employees.index'))->with('status','Employee has been deleted.');
    }
}
