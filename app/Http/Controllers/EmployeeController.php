<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;


class EmployeeController extends Controller
{
    public function ReadJson(){
        
        $file = storage_path('app/public/employees.json');
        if(!file_exists($file)){
            return[];
        }
        else{
            $json = file_get_contents($file);
        return json_decode($json, true);
        }
    }

    public function WriteJson($data){
        try{
            $file = storage_path('app/public/employees.json');
            $json = json_encode($data, JSON_PRETTY_PRINT);
            file_put_contents($file, $json);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function generateId(){
        $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        
        $id = 'emp_';
        for ($i = 0; $i < 8; $i++) {
            $id .= $letters[rand(0, strlen($letters) - 1)];
        }
        return $id;
    }


    public function store(Request $request)
    {
        $employees = $this->ReadJson();
        $newEmployee = [];
        $newEmployee['id'] = $this->generateId();
        $newEmployee['fullName'] = $request->input('fullName');
        $newEmployee['email'] = $request->input('email');
        $newEmployee['age'] = (int)$request->input('age');
        $newEmployee['department'] = strtoupper($request->input('department'));
        if($request->input('isActive') === 'on')
            $newEmployee['isActive'] = true;
        else
        $newEmployee['isActive'] = false;
        $newEmployee['createdAt'] = time();
        $employees[] = $newEmployee;
        $abc = $this->WriteJson($employees);
        if($abc){
            return redirect('/employees')->with('success', 'Employee created successfully.');
        } else {
            return redirect('/create');

        }

        
        
        
        
    }
    public function edit($id){
       $employees = $this->ReadJson();
       foreach($employees as $emp) {
        if($emp['id']==$id){
            return view('employees.edit',['employee'=>$emp]);
        }
       }
    }

    public function index()
    {
        $employees = $this->ReadJson();
        return view('employees.index', ['employees' => $employees]);
    }

    public function show($id){
        $employees = $this->ReadJson();
        foreach($employees as $employee){
            if($employee['id']==$id){
                return view('employees.show',['employee'=>$employee]);
            }
        }
    }

    public function create()
    {
        return view('employees.create');
    }

public function update(Request $request, $id)
{
        $employees = $this->ReadJson();
        $newEmployee = [];
        $newEmployee['fullName'] = $request->input('fullName');
        $newEmployee['email'] = $request->input('email');
        $newEmployee['age'] = (int)$request->input('age');
        $newEmployee['department'] = strtoupper($request->input('department'));
        if($request->input('isActive') === 'on')
            $newEmployee['isActive'] = true;
        else
        $newEmployee['isActive'] = false;
        $newEmployee['createdAt'] = time();
        foreach($employees as $index => $employees) {
            if($employees['id']==$id){
                $employees[$index] = $newEmployee;
            }
        }
        $abc = $this->WriteJson($employees);

        if($abc){
            return redirect('/employees')->with('success', 'Employee created successfully.');
        } else {
            return redirect('/create');


        }
           
        
        
        
    }
    public function delete($id){
        $employees=$this->ReadJson();
        $newData=[];
        foreach($employees as $employee){
            if($employee['id'] != $id){
                $newData[]=$employee;
            }
        }
        
    }}// fin classe

