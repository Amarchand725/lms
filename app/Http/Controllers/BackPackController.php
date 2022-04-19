<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Backpack;
use Auth;

class BackPackController extends Controller
{
    public function index()
    {
        $models = Backpack::orderby('id', 'desc')->where('by_teacher_id', Auth::user()->id)->paginate(10);
        return view('backpacks.index', compact('models'));
    }

    public function destroy(Request $request)
    {
        return Backpack::whereIn('id', json_decode($request->material_files))->delete();
    }
}
