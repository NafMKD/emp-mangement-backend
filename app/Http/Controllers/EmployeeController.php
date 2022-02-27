<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return all employees for table view
        return Employee::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validating requested data
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|string', 
            'region' => 'required|string', 
            'zone' => 'required|string',  
            'city' => 'required|string', 
            'house_no' => 'required|string', 
            'martial_status' => 'required|string', 
            'work_position' => 'required|string', 
            'start_date' => 'required|date_format:Y-m-d', 
            'salary' => 'required|numeric'
        ]);

        // storing instance
        $data = Employee::create([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'phone' => $request->get('phone'), 
            'region' => $request->get('region'), 
            'zone' => $request->get('zone'),  
            'city' => $request->get('city'), 
            'house_no' => $request->get('house_no'), 
            'martial_status' => $request->get('martial_status'), 
            'work_position' => $request->get('work_position'), 
            'start_date' => $request->get('start_date'), 
            'salary' => $request->get('salary')
        ]);

        // returning instance
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return all employees for table view
        return Employee::find($id);
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
        // validating requested data
        $request->validate([
            'first_name' => 'string',
            'last_name' => 'string',
            'phone' => 'string', 
            'region' => 'string', 
            'zone' => 'string',  
            'city' => 'string', 
            'house_no' => 'string', 
            'martial_status' => 'string', 
            'work_position' => 'string', 
            'start_date' => 'date_format:Y-m-d', 
            'salary' => 'numeric'
        ]);
        
        // getting instance 
        $data = Employee::find($id);

        // updating instance
        $data->update([
            'first_name' => ($request->get('first_name')=="")? $data->first_name: $request->get('first_name'),
            'last_name' => ($request->get('last_name')=="")? $data->last_name: $request->get('last_name'),
            'phone' => ($request->get('phone')=="")? $data->phone: $request->get('phone'), 
            'region' => ($request->get('region')=="")? $data->region: $request->get('region'), 
            'zone' => ($request->get('zone')=="")?  $data->zone: $request->get('zone'),  
            'city' => ($request->get('city')=="")? $data->city: $request->get('city'), 
            'house_no' => ($request->get('house_no')=="")? $data->house_no: $request->get('house_no'), 
            'martial_status' => ($request->get('martial_status')=="")? $data->martial_status: $request->get('martial_status'), 
            'work_position' => ($request->get('work_position')=="")? $data->work_position: $request->get('work_position'), 
            'start_date' => ($request->get('start_date')=="")? $data->start_date:$request->get('start_date'), 
            'salary' => ($request->get('salary')=="")? $data->salary:$request->get('salary')
        ]);

        // returning instance
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // getting employee and deleting
        $data=Employee::find($id);
        // checking
        if ($data){
            $data->delete();
          $res=[
            'status'=>'true'
            ];
        }else{
          $res=[
            'status'=>'false'
            ];
        }
        return $res;
    }
}
