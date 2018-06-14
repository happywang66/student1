<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        //获得所有数据
        //$students = Student::get();
        //分页 view：$students->render()
        $students = Student::paginate(2);
        return View('student/index',['students'=>$students]);
    }

    public function add()
    {
        $student = new Student();
        $student->name = 'xiaosan';
        $student->age = 23;
        $boole = $student->save();
        if ($boole)
            return "add success";
    }

    public function create(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->input('Student');
            if(Student::create($data)){
                return redirect('student/index');
            }else{
                return redirect()->back();
            }
        }
        return View('student.create');
    }
    //保持添加
    public function save(Request $request)
    {
        $data = $request->input('Student');
        $student = new Student();
        $student->name = $data['name'];
        $student->age = $data['age'];
        $student->sex = $data['sex'];
        if($student->save()){
            return redirect('student/index');
        }else{
            return redirect()->back();
        }


    }
}

