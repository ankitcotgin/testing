<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{
    public  function index(){
        return view('validation.index');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:5',
            'mobile' => 'required|min:10|max:10',
            'altmobile' => 'max:10',
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()->all()
            ]);
        }

        // your article save codes here...

        return response()->json([
            'success' => 'Article created successfully'
        ]);
    }
}
