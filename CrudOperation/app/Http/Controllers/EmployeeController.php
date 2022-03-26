<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Employee;
use ItemMenuFacades;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item_menu= ItemMenuFacades::getItemMenu();
        
        $employee=Employee::all();
        return view('admin.index',compact('employee'))->with(['item_menu'=>$item_menu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
       
        $this->validate($request,[
        'name'=>'required',
        'mobile'=>'required|digits:10',
        'email'=>'required|email|unique:employees',
        'salary'=>'required|between:0,10',
        'address'=>'required|max:300'
        ],[
        'name.required'=>'Employee name should not be empty',
        'mobile.digits'=>'Mobile Should be 10 digits',
        'email.required'=>'Plaes enter valid email id',
        'salary.required'=>'salary should be more than zero',
        'address.required'=>'Please enter your resgister address',
        'address.max'=>'Address should be less than 300 characters',
        ]);

        Employee::create($request->all());
        return redirect()->route('employees.index')->with('success','Employee details added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee=Employee::find($id);
        return view('admin.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //$employee=Employee::select('email')->where('id',$id)->get()->toArray();
        //$email=$employee[0]["email"];

        $employee = Employee::where('id', $id)->pluck('email')->toArray();
        $email=$employee[0];

        if($email==$request->email){
        $email_validation = 'required';
        }else{
        $email_validation = 'required|email|unique:employees';
        }

        $this->validate($request,[
        'name'=>'required',
        'mobile'=>'required|digits:10',
        'email'=>$email_validation,
        'salary'=>'required',
        'address'=>'required|max:300'
        ],[
        'name.required'=>'Employee name should not be empty',
        'mobile.required'=>'Mobile Should be 10 digits',
        'email.required'=>'Plaes enter valid email id',
        'salary.required'=>'salary should be more than zero',
        'address.required'=>'Please enter your resgister address',
        'address.max'=>'Address should be less than 300 characters',
        ]);

        Employee::find($id)->update($request->all());
        return redirect()->route('employees.index')->with('success','Employee details updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::find($id)->delete();
        return redirect()->route('employees.index')->with('success','Employee details deleted successfully');
    }
}
