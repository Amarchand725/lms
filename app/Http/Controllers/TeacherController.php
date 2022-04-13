<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Department;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = Teacher::orderby('id', 'desc')->get();
        return view('teachers.index', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::orderby('id', 'desc')->where('status', 1)->get();
        return view('teachers.create', compact('departments'));
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
            'department_id' => 'required',
            'first_name' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|same:password_confirmation|min:6',
            'location' => 'max:255',
            'about' => 'max:1000',
        ]);

        $user = User::create([
            'name' => $request->first_name.' '.$request->location,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if($user){
            $user->assignRole('Teacher');
            Teacher::create([
                'user_id' => $user->id,
                'department_id' => $request->department_id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'location' => $request->location,
                'about' => $request->about,
            ]);
        }
        \LogActivity::addToLog('Teacher Added');
        return redirect()->route('teacher.index')->withStatus(__('Teacher successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Teacher::where('id', $id)->first();
        $departments = Department::orderby('id', 'desc')->where('status', 1)->get();
        return view('teachers.edit', compact('model', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!empty($request->password)){
            $this->validate($request, [
                'department_id' => 'required',
                'first_name' => 'required|max:255',
                'email' => 'required|max:255',
                'password' => 'required|same:password_confirmation|min:6',
                'location' => 'max:255',
                'about' => 'max:1000',
            ]);
        }else{
            $this->validate($request, [
                'department_id' => 'required',
                'first_name' => 'required|max:255',
                'email' => 'required|max:255',
                'location' => 'max:255',
                'about' => 'max:1000',
            ]);
        }

        $model = Teacher::where('id', $id)->first();
        $model->department_id = $request->department_id;
        $model->first_name = $request->first_name;
        $model->last_name = $request->last_name;
        $model->location = $request->location;
        $model->about = $request->about;
        $model->status = $request->status;
        $model->save();

        if($model){
            $user = User::where('id', $model->user_id)->first();
            $user->name = $request->first_name.' '.$request->last_name;
            $user->email = $request->email;
            if(!empty($request->password) && $request->password==$request->password_confirmation){
                $user->password = Hash::make($request->password);
            }
            $user->update();
        }
        \LogActivity::addToLog('Teacher Updated');
        return redirect()->route('teacher.index')->withStatus(__('Teacher successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Teacher::where('id', $id)->first();
        if($model){
            User::where('id', $model->user_id)->delete();
            
            $model->delete();
            \LogActivity::addToLog('Teacher deleted');
            return redirect()->route('teacher.index')->withStatus(__('Teacher successfully deleted.'));
        }
    }
}
