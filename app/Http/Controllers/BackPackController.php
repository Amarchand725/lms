<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Backpack;

class BackPackController extends Controller
{
    public function index()
    {
        $models = Backpack::orderby('id', 'desc')->paginate(10);
        return view('backpacks.index', compact('models'));
    }

    public function destroy(Request $request)
    {
        return Backpack::whereIn('id', json_decode($request->material_files))->delete();
    }
}
