<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;
use App\Models\StudyClass;
use App\Models\User;
use App\Models\SchoolYear;
use App\Models\Notification;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = Student::orderby('id', 'desc')->get();
        return view('students.index', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $study_classes = StudyClass::where('status', 1)->get();
        return view('students.create', compact('study_classes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'study_class_id' => 'required',
            'student_id' => 'max:255',
            'first_name' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|same:password_confirmation|min:6',
            'location' => 'max:255',
        ]);

        $user = User::create([
            'name' => $request->first_name.' '.$request->location,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if($user){
            $user->assignRole('Student');
            $batch = SchoolYear::orderby('id', 'desc')->where('status', 1)->first();
            Student::create([
                'user_id' => $user->id,
                'batch_id' => $batch->id,
                'study_class_id' => $request->study_class_id,
                'student_id' => $request->student_id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'location' => $request->location,
            ]);
        }
        \LogActivity::addToLog('Student Added');
        return redirect()->route('student.index')->withStatus(__('Student successfully created.'));
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

    public function notifications()
    {
        $models = Notification::orderby('id', 'desc')->paginate(10);
        return view('classmates.notifications', compact('models'));
    }

    public function classmates($study_class_id)
    {
        $batch = SchoolYear::orderby('id', 'desc')->where('status', 1)->first();
        $models = Student::orderby('id', 'desc')->where('study_class_id', $study_class_id)->get();
        return view('classmates.classmate', compact('models', 'batch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Student::where('id', $id)->first();
        $study_classes = StudyClass::where('status', 1)->get();
        return view('students.edit', compact('model', 'study_classes'));
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
        if(!empty($request->password)){
            $this->validate($request, [
                'study_class_id' => 'required',
                'student_id' => 'max:255',
                'first_name' => 'required|max:255',
                'email' => 'required|max:255',
                'password' => 'same:password_confirmation|min:6',
                'location' => 'max:255',
            ]);
        }else{
            $this->validate($request, [
                'study_class_id' => 'required',
                'student_id' => 'max:255',
                'first_name' => 'required|max:255',
                'email' => 'required|max:255',
                'location' => 'max:255',
            ]);
        }

        $student = Student::where('id', $id)->first();
        $student->study_class_id = $request->study_class_id;
        $student->student_id = $request->student_id;
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->location = $request->location;
        $student->status = $request->status;
        $student->save();

        if($student){
            $user = User::where('id', $student->user_id)->first();
            $user->name = $request->first_name.' '.$request->last_name;
            $user->email = $request->email;
            if(!empty($request->password) && $request->password==$request->password_confirmation){
                $user->password = Hash::make($request->password);
            }
            $user->update();
        }
        \LogActivity::addToLog('Student Updated');
        return redirect()->route('student.index')->withStatus(__('Student successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Student::where('id', $id)->first();
        if($model){
            User::where('id', $model->user_id)->delete();

            $model->delete();
            \LogActivity::addToLog('Student Deleted');
            return redirect()->route('student.index')->withStatus(__('Student successfully deleted.'));
        }
    }
}
