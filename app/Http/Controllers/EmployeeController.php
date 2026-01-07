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
        dd("jhhgjhgjhg");
        return view('employees.create');
    }
}
